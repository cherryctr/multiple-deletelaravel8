<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('layout/products',compact('products'));
    }


    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Product::delete($id);
      return response()->json(['success'=>"Product Deleted successfully.", 'tr'=>'tr_'.$id]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Product::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Products Deleted successfully."]);
    }


    //PRODUK

    public function create()
    {
        // $products = Product::get();
        return view('layout/add');
    }

    public function prosestambahproduct(Request $request)
    {
         $this->validate($request, [
            'product_images'     => 'required|image|mimes:png,jpg,jpeg',
            'product_name'     => 'required',
            'product_stocks'   => 'required',
            'product_qty'   => 'required',
            'product_deskripsi'   => 'required'
        ]);

        //upload image
        $product = new Product();
        $product->product_name = $request->get('product_name');
        $product->product_deskripsi = $request->get('product_deskripsi');
        $product->product_stocks = $request->get('product_stocks');
        $product->product_qty = $request->get('product_qty');

        
        if ($request->hasFile('product_images')) {
            // $post->delete_image();
            $product_images = $request->file('product_images');
            // echo $photo_profile;exit;
            $name = rand(1000, 9999) . $product_images->getClientOriginalName();
            $product_images->move('img', $name);
            $product->product_images = $name;
        }
        $product->save();


        // dd($slider);
        if($product){
            //redirect dengan pesan sukses
            return redirect()->route('index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

}


