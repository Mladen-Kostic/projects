@extends('layouts.main')

@section('content')

<section class="cart container mt-2 my-3 py-5">
<button class="btn btn-warning" onclick="history.back()">&#8592; Back</button>
        @if(Session::has('cart') && Session::get('cart'))
          <div class="container mt-2 text-center">
            <h4 class="product-title">Your Cart</h4>
            <hr class="mx-auto">
          </div>

            <table class="pt-5">
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                @foreach(Session::get('cart') as $product)
                <tr class="id{{ $product['id'] }} countRows">
                    <td>
                        <div class="product-info">
                        <img style="width: 14rem;" src="{{ asset('images/' . $product['image']) }}">
                        <div>
                            <p>{{ $product['name'] }}</p>
                            <div class="cartPrice1">
                            <small class="product-title">$ {{ $product['price'] }}</small>
                            </div>
                            <form id="{{ $product['id'] }}" class="removeForm" name="removeForm">
                            <!-- <form method="POST" action="{{ route('remove_from_cart') }}"> -->
                                @csrf
                                <input type="hidden" name="id" value="{{ $product['id'] }}">
                                <input type="submit" name="remove_btn" class="remove-btn" value="Remove" title="Remove from Cart">
                            </form>
                        </div>
                        </div>
                    </td>

                    <td>
                        <form class="editForm" name="editForm">
                        <!-- <form method="POST" action="{{ route('edit_product_quantity') }}"> -->
                            @csrf
                            <input type="submit" value="-" class="edit-btn" name="decrease_product_quantity_btn">

                            <input type="hidden" name="id" value="{{ $product['id'] }}">
                            <input type="text" name="quantity" value="{{ $product['quantity'] }}" readonly>

                            <input type="submit" value="+" class="edit-btn" name="increase_product_quantity_btn">
                        </form>
                    </td>

                    <td>
                        <span class="product-price">
                        $ {{ $product['price'] * $product['quantity'] }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </table>
            @if(Session::has('total') && Session::get('total') > 0)
                <div class="cart-total">
                <table>
                    <tr class="cart-total-price">
                    <td>Total</td>
                    <td>$ {{ Session::get('total') }}</td>
                    </tr>
                </table>
                </div>

                <div class="checkout-container">
                <form method="GET" action="{{ route('checkout') }}">
                    @csrf
                    <input type="submit" class="btn checkout-btn" value="Checkout" name="">
                </form>
                </div>
            @endif
          
        @else

          <div class="container mt-2 text-center">
            <h4 class="product-title">Your Cart is currently empty</h4>
            <hr class="mx-auto">

            <a class="btn checkout-btn" href="{{ route('products') }}">Go To Products</a>
          </div>

        @endif
    
</section>

@endsection