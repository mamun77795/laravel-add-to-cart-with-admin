@extends('layout')
    @section('content')
        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4">
                <div class="img_thumbnail productlist">
                    <img src="{{asset('img')}}/{{$product->photo}}" class="img-fluid" style="height:250px;" alt="Image">
                    <div class="caption">
                        <h4>{{$product->product_name}}</h4>
                        <p>{{$product->product_description}}</p>
                        <p><strong>Price:</strong>{{$product->price}}</p>
                        <p class="btn-holder"><a href="{{route('add_to_cart', $product->id)}}" class="btn btn-primary btn-block text-center">Add to cart</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endsection