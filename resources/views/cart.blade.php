@extends('layouts.main')

@section('content')
</div>
<section class="cart container  py-5">
    <div class="container ">
        <h4>Your Cart</h4>
    </div>
    <table class="pt-5">
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>

        @if (Session::has('cart'))
        @foreach (Session::get('cart') as $product )



        <tr>
            <td>
                <div class="product-info">
                    <img src="{{asset('images/'.$product['image'])}}" >
                    <!--style="width:75px; height:75px"-->
                <div>
                <p>{{$product['name'] }}</p>
                <small><span>$</span>{{$product['price'] }}</small>
                <br>
                <form method="POST" action="{{route('remove_from_cart')}}">
                  @csrf
                  <!--  <input type="submit" name="remove_btn" value="remove" class="remove-btn">-->
                </form>
                </div>
                </div>
            </td>
            <td>
                <form method="POST" action="{{route('edit_product_quantity')}}">
                  @csrf
                    <input type="submit" name="decrease_product_quantity_btn" value="-" class="edit-btn">

                    <input type="hidden" name="id" value="{{$product['id']}}">
                    <input type="number" name="quantity" value="{{$product['quantity']}}" readonly>
                    <input type="submit" name="increase_product_quantity_btn" value="+" class="edit-btn">
                </form>
            </td>
            <td>
                <span class="product-price">${{$product['price'] * $product['quantity']}}</span>
            </td>
        </tr>
        @endforeach
        @endif
    </table>


    <div class="cart-total">
      @if (Session::has('cart'))

        <table>

            <tr>
                <td>total</td>
                @if (Session::has('total'))

                <td>${{Session::get('total')}}</td>
                @endif
            </tr>
        </table>
        @endif

    </div>

    <div class="checkout-container">
      @if(Session::has('total'))
      @if(Session::get('total')!= null)
        <form method="GET" action="{{route('checkout')}}">
            <input type="submit" name="" value="checkout" class="btn checkout-btn">
        </form>
        @endif
        @endif
    </div>
</section>



@endsection
