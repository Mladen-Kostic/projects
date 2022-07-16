@extends('layouts.main')

@section('content')

<section class="cart container py-5">

    <div class="container mt-2 text-center product-title">
        <h4>Order # {{ $order_id }}</h4>
    </div>

    <table class="pt-5">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Cost</th>
            <th>Quantity</th>
            <th>Date</th>
        </tr>
        @foreach($details_array as $detail)
            <tr>

                <td>
                    <div>
                        <img style="width: 17rem" src="{{ asset('images/' . $detail->product_image) }}" alt="">
                    </div>
                </td>

                <td>
                    <div class="product-info">
                        <div>
                            <p>{{ $detail->product_name }}</p>
                            <small><span></span></small>
                            <br>
                        </div>
                    </div>
                </td>

                <td>
                    <p class="cart-total-price">$ {{ $detail->price }}</p>
                </td>

                <td>
                    <p>{{ $detail->product_quantity }}</p>
                </td>

                <td>
                    <span class="product-price">{{ $detail->order_date }}</span>
                </td>

            </tr>
        @endforeach

    </table>

</section>

@endsection