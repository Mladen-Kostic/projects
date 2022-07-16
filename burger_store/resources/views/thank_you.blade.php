@extends('layouts.main')

@section('content')

<section class="container mt-2 my-3 py-5">
    <div class="container mt-2 text-center">
        <h4 style="margin-bottom: 3rem;">Thank You!</h4>


        @if(Session::has('order_id') && Session::get('order_id') != null)

        <h4 class="product-title" style="margin: 2rem 0 2rem 0;">
            Order id: {{ Session::get('order_id') }}
        </h4>

        <p style="margin: 2rem 0 2rem 0;">Please keep order id for future reference.</p>
        <p style="margin: 2rem 0 2rem 0;">Your order will be delivered within 40 minutes.</p>

        @endif
        
    </div>
</section>

@endsection