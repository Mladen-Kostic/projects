@extends('layouts.main2')

@section('content')

<!-- food section -->

  <div class="container row text-center my-3 mx-auto">
    @foreach($product_array as $product)
      <div class=" col-lg-12 my-3">
        <div class="img-box">
          <img src="{{ asset('images/' . $product->image) }}" style="width:200px" alt="">
        </div>
        <div >
          <h6>
            {{ $product->name }}
          </h6>
          <p>{{ $product->description }}</p>
          <p>{{ $product->category }}</p>
          <h3>
            <span>$</span>{{ $product->price }}
          </h3>
          <a href="">
            Buy Now
          </a>
        </div>
      </div>
    @endforeach  
       

  </div>


  <!-- end food section -->

@endsection