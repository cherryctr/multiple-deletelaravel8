@extends('layout.app')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12 mb-5">
                <div class="jumbotron mt-5">
                    <h1 class="display-4">Tambah Data</h1>
                    
                </div>
                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif

                <div class="card border-0 shadow rounded">
                    <div class="card-body">

                        <form action="{{ route('tambah')  }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title">Product Name</label>
                                <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                                    name="product_name" value="{{ old('product_name') }}" required>

                                <!-- error message untuk  -->
                                @error('product_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">Stock</label>
                                <input type="number" class="form-control @error('product_stocks') is-invalid @enderror"
                                    name="product_stocks" value="{{ old('product_stocks') }}" required>

                                <!-- error message untuk product_stocks -->
                                @error('product_stocks')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">Product Quantity</label>
                                <input type="number" class="form-control @error('product_qty') is-invalid @enderror"
                                    name="product_qty" value="{{ old('product_qty') }}" required>

                                <!-- error message untuk product_qty -->
                                @error('product_qty')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            

                            <div class="form-group">
                                <label for="content">Produk Deskripsi</label>
                                <textarea
                                    name="product_deskripsi" id="content"
                                    class="form-control @error('product_deskripsi') is-invalid @enderror"
                                    rows="5"
                                    required>{{ old('product_deskripsi') }}</textarea>

                                <!-- error message untuk product_deskripsi -->
                                @error('product_deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Example file input</label>
                                <input type="file" class="form-control-file" name="product_images" id="exampleFormControlFile1">
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                            <a href="{{ url('myproducts') }}" class="btn btn-md btn-secondary">back</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection