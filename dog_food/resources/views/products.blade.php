@extends('layouts.main2')

@section('content')

<!-- food section -->
  @if(Session::has('message'))

    <p class="{{ Session::get('alert-class') }}">{{ Session::get('message') }}</p>

  @endif
  <div class="container row text-center my-3 mx-auto">

    @foreach($products as $product)
      <div class=" col-lg-3 my-3">
        <div class="img-box">
          <a href="{{ route('single_product', ['id'=>$product->id]) }}">
            <img style="height: 10rem; width: 55%;" src="{{ asset('images/' . $product->image) }}" style="width:200px" alt="">
          </a>
        </div>
          <div>
            <h6>
              {{ $product->name }}
            </h6>
            <h3>
              @if($product->sale_price)
                <p class="on-sale">$ {{ $product->price }}</p>
                <span>$ {{ $product->sale_price }}</span>
              @else
                <span>$ {{ $product->price }}</span>
              @endif
            </h3>
            
            <form method="POST" action="{{ route('add_to_cart') }}">
              @csrf
              <input type="hidden" name="id" value="{{ $product->id }}">
              <input type="hidden" name="name" value="{{ $product->name }}">
              <input type="hidden" name="price" value="{{ $product->price }}">
              <input type="hidden" name="sale_price" value="{{ $product->sale_price }}">
              <input type="hidden" name="quantity" value="1">
              <input type="hidden" name="image" value="{{ $product->image }}">
              <input type="submit" value="Add to Cart" class="btn btn-warning text-white">
            </form>

          </div>
      </div>
      @endforeach
      
    </div>


  <!-- end food section -->

@endsection