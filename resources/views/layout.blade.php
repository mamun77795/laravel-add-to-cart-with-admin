<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0f8d547318.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
    <div class="container">
        <div class="d-flex">
            <div class="dropdown ml-auto p-2">
                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{count((array) session('cart'))}}</span>
                </button>
                <div class="dropdown-menu" style="width: 300px;;" aria-labelledby="dropdown">
                    <div class="row">
                        @php $total=0 @endphp
                        @foreach((array) session('cart') as $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                        <div class="col-md-12">
                            <p><strong>Total: <span class="text-success"> {{ $total }}</span></strong></p>
                        </div>
                    </div>
                    <hr>
                        @if(session('cart'))
                        @foreach((array) session('cart') as $details)
                        
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{asset('img')}}/{{$details['photo']}}" alt="">
                            </div>
                            <div class="col-md-8">
                                <h5>{{$details['product_name']}}</h5>
                                <span class="text-success"><strong>{{$details['price']}}</strong></span> <span> Quantity: {{$details['quantity']}}</span>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{route('cart')}}" class="btn btn-primary btn-block">View All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        @yield('content')
    </div>
    @yield('script')
</body>

</html>