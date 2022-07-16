@extends('layouts.main2')

@section('content')
<section class="food_section">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Menu
        </h2>
      </div>

      <ul class="filters_menu filters-menu-links">
        <a href="{{ route('products') }}">
        <li data-filter="*">All</li>
        </a>

        <a href="{{route('category',['category'=>'burger'])}}">
        <li data-filter=".burger">Burger</li>
       </a>

        <a href="{{route('category',['category'=>'pizza'])}}">
        <li data-filter=".fries">Pizza</li>
        </a>

        <a href="{{route('category',['category'=>'pasta'])}}">
        <li data-filter=".fries">Pasta</li>
        </a>

        <a href="{{route('category',['category'=>'sides'])}}">
        <li data-filter=".fries">Sides</li>
        </a>

       <a href="{{route('category',['category'=>'breakfast'])}}">
        <li data-filter=".pizza">Breakfast</li>
      </a>


      <a href="{{route('category',['category'=>'beverages'])}}">
        <li data-filter=".pasta">Beverages</li>
        </a>

      </ul>

        <div class="flex-row-container">
          @foreach($products as $product)
            <div class="box flex-row-item">
              <div>
                <a href="{{route('single_product',['id'=>$product->id])}}">
                  <div class="img-box">
                    <img style="width: 17rem;" src="{{ asset('images/'.$product->image) }}" alt="">
                  </div>
                </a>
                <div class="detail-box">

                  <a href="{{route('single_product',['id'=>$product->id])}}">
                     <h4 class="product-title">
                     <!-- <h4 style="color:#fff; margin-bottom: 10px"> -->
                    {{ $product->name }}
                  </h4>
                  </a>
                 
                  <p style="margin-bottom: 6rem;">
                    {{ $product->description }}
                  </p>
                  <div class="options">
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

                    <button id="{{ $product->id }}" class="addToCart" style="background: none; border:none; margin-left: 1rem" title="Add To Cart">
                      <img src="{{ asset('images/cart.png') }}" alt="cart">
                    </button>

                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
    </div>
  </section>

  <!-- end food section -->





@endsection