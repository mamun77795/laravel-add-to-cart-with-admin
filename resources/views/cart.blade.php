@extends('layout')

@section('content')
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%;">Product</th>
            <th style="width:10%;">Price</th>
            <th style="width:8%;">Quantity</th>
            <th style="width:22%;" class="text-center">Subtotal</th>
            <th style="width:10%;"></th>
        </tr>
    </thead>
    <tbody>
        @if(session('cart'))
        @foreach((array) session('cart') as $details)
        <tr data-id="{{$details['id']}}">
            <td data-th="product">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{asset('img')}}/{{$details['photo']}}" style="width: 100px; height:100px;" alt="">
                    </div>
                    <div class="col-md-9">
                        <h4>{{$details['product_name']}}</h4>
                    </div>
                </div>
            </td>
            <td data-th="price">${{$details['price']}}</td>
            <td data-th="quantity">
                <input type="number" class="quantity" id="update_cart" value="{{$details['quantity']}}" min="1">
            </td>
            <td data-th="subtotal" class="text-right">${{$details['price'] * $details['quantity']}}</td>
            <td data-th="" class="actions">
                <button type="submit" class="btn btn-danger" id="cart_remove">Delete</button>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
    <tfoot>
        @php $total=0 @endphp
        @foreach((array) session('cart') as $details)
            @php $total += $details['price'] * $details['quantity'] @endphp
        @endforeach
        <tr>
            <td colspan="4" class="text-right">Total:<strong> ${{$total}}</strong></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{url('/')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Continue Shopping</a>
                <button class="btn btn-success">Checkout</button>
            </td>
        </tr>
    </tfoot>
</table>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
        $(function(){
            $('#cart_remove').click(function(e){
                e.preventDefault();

                var ele = $(this);
                if(confirm('Are sure to remove?')){
                    $.ajax({
                        url:"{{route('remove_from_cart')}}",
                        method: "DELETE",
                        data:{
                            _token:'{{ csrf_token() }}',
                            id: ele.parents('tr').attr('data-id')
                        },
                        success: function(response){

                        }
                    });
                    location.reload();
                }
            });

            $('#update_cart').change(function(e){
                e.preventDefault();

                var ele = $(this);

                $.ajax({
                    url:"{{route('update_cart')}}",
                    method: "patch",
                    data:{
                        _token: '{{ csrf_token() }}',
                        id: ele.parents('tr').attr('data-id'),
                        quantity: ele.parents('tr').find('.quantity').val()
                    },
                    success: function(response){
                        location.reload();
                    }
                });
            });
        });
    </script>
@endsection