@extends('layout.app')

@section('content')
<div class="container">
    <h3>Laravel 8 - Multiple delete records with checkbox example</h3>
    <button style="margin-bottom: 10px" class="btn btn-primary delete_all" data-url="{{ url('myproductsDeleteAll') }}">Delete All Selected</button>

    <a href="{{ url('myproducts/create') }}" style="margin-bottom: 10px" class="btn btn-primary">Tambah Data</a>
    <table class="table table-bordered">
        <tr>
            <th width="50px"><input type="checkbox" id="master"></th>
            <th width="80px">No</th>
            <th>Product Images</th>
            <th>Product Name</th>
            <th>Product Deskripsi</th>
            <th>Product Stocks</th>
            <th>Product Quantity</th>
            <th width="100px">Action</th>
        </tr>
        @if($products->count())
            @foreach($products as $key => $product)
                <tr id="tr_{{$product->id}}">
                    <td><input type="checkbox" class="sub_chk" data-id="{{$product->id}}"></td>
                    <td>{{ ++$key }}</td>
                    <td><img src="{{ asset('img/'. $product->product_images ) }}" class="img-responsive" style="width: 250px; height: 100px;"></td>
                    
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->product_deskripsi }}</td>
                    <td>{{ $product->product_stocks }}</td>
                    <td>{{ $product->product_qty }}</td>
                    <td>
                         <a href="{{ url('myproducts',$product->id) }}" class="btn btn-danger btn-sm"
                           data-tr="tr_{{$product->id}}"
                           data-toggle="confirmation"
                           data-btn-ok-label="Delete" data-btn-ok-icon="fa fa-remove"
                           data-btn-ok-class="btn btn-sm btn-danger"
                           data-btn-cancel-label="Cancel"
                           data-btn-cancel-icon="fa fa-chevron-circle-left"
                           data-btn-cancel-class="btn btn-sm btn-default"
                           data-title="Are you sure you want to delete ?"
                           data-placement="left" data-singleton="true">
                            Delete
                        </a>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
</div>
@endsection