@extends('layout')
    @section('content')
        <div class="row">
        <a href="{{url('/admin')}}" class="btn btn-success">Product List</a>
        </div>
        <div class="row">
            <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input class="form-control" type="text" name="product_name" placeholder="Enter product name">
                </div>
                <div class="form-group">
                    <label for="product_description">Product Description</label>
                    <input class="form-control" type="text" name="product_description" placeholder="Enter product description">
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input class="form-control" type="file" name="photo">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input class="form-control" type="text" name="price" placeholder="Enter product price">
                </div>
                <input type="submit" class="btn btn-success" value="Submit">
            </form>
        </div>
    @endsection