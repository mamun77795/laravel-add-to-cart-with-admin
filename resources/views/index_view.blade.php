@extends('layout')
@section('content')
    <a href="{{route('products.create')}}" class="btn btn-success">Add Product</a>
    <table class="table table-striped">
        <tr>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Product Price</th>
            <th>Photo</th>
            <th>Action</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{$product->product_name}}</td>
            <td>{{$product->product_description}}</td>
            <td>{{$product->price}}</td>
            <td>
                <img src="{{asset('img')}}/{{$product->photo}}" style="width: 50px; height:50px;" alt="">
            </td>
            <td>
                <form action="{{route('products.destroy', $product->id)}}" method="post">
                    @csrf
                    @method('delete')
                    
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection