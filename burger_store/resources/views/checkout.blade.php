@extends('layouts.main')

@section('content')

<section class="my-2 py-3 checkout">
<button id="checkout-bbuton" class="btn btn-warning" onclick="history.back()">&#8592; Back</button>
    <div class="container text-center mt-1 pt-5">
        <h2>Check Out</h2>
        <hr class="mx-auto">
    </div>

    <div class="mx-auto container">
        <form id="checkout-form" method="POST" action="{{ route('place_order') }}">
            @csrf
            <div class="form-group checkout-small-element">
                <label for="">Name</label>
                <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Name" required>
            </div>

            <div class="form-group checkout-small-element">
                <label for="">Email</label>
                <input type="email" class="form-control" id="checkout-email" name="email" placeholder="Email Address" required>
            </div>

            <div class="form-group checkout-small-element">
                <label for="">Phone</label>
                <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="Phone Number" required>
            </div>

            <div class="form-group checkout-small-element">
                <label for="">City</label>
                <input type="text" class="form-control" id="checkout-city" name="city" placeholder="City" required>
            </div>

            <div class="form-group checkout-large-element">
                <label for="">Address</label>
                <input type="text" class="form-control" id="checkout-address" name="address" placeholder="Address" required>
            </div>
            
            @if(Session::has('total'))
                @if(Session::get('total') != null)
                    <div class="form-group checkout-btn-container">
                        <p class="product-title">Total amount: $ {{ Session::get('total') }}</p>
                        <input type="submit" class="btn" id="checkout-btn" name="checkout_btn" value="Checkout">
                    </div>
                @endif
            @endif
        
        </form>
    </div>
</section>

@endsection