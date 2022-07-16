@extends('layouts.main')

@section('content')

<section class="food_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2 class="product-title">
          {{ $product_array[0]->name }}
        </h2>

        @if($product_array[0]->sale_price)
          <div>
            <h4 class="product-price-linethrough">
                $ {{ $product_array[0]->price }}
            </h4>
            <h4 class="product-title">
              $ {{ $product_array[0]->sale_price }}
            </h4>
          </div>
        @else
          <h4 class="product-title">
              $ {{ $product_array[0]->price }}
          </h4>
        @endif
        
      </div>


      <div class="filters-content">
        <div class="row grid">

        @foreach($product_array as $product)
          <div class="col-sm-6 col-lg-12 all">
            <div class="box text-center">
              <div>
                <div class="img-box">
                  <img style="width:300px" src="{{ asset('images/' . $product->image) }}" alt="">
                </div>
                <div class="detail-box">
                  <h4 class="product-title">
                    {{ $product->name }}
                  </h4>
                  <p>
                    {{ $product->description }}
                  </p>

                  @if($product->sale_price)
                    <div>
                      <h4 class="product-price-linethrough">
                          $ {{ $product->price }}
                      </h4>
                      <h4 class="product-title">
                        $ {{ $product->sale_price }}
                      </h4>
                    </div>
                  @else
                    <h4 class="product-title">
                        $ {{ $product->price }}
                    </h4>
                  @endif

                  <div class="options">
                    <h6 class="product-title">
                      <p>
                        {{ $product->category }} -
                        {{ $product->type }}
                      </p>
                    </h6>
                    <button id="{{ $product->id }}" class="addToCart" style="background: none; border:none; margin-left: 1rem" title="Add To Cart">
                      <img src="{{ asset('images/cart.png') }}" alt="cart">
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach

        </div>
      </div>

    </div>
</section>

@endsection