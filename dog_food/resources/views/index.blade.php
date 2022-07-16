@extends('layouts.main')

@section('content')

  <!-- food section -->

  <section class="food_section layout_padding">
    <div class="container text-center">
      <div class="heading_container">
        <img src="{{ asset('images/heading-img.png') }}" alt="">
        <h2>
          High quality pet foods for high nutrition.
        </h2>
        <p>
          The pet food that contains the right choice of nutrients, ultimate food for your pet friend.
        </p>
      </div>

      <div class="food_container">

        @foreach($products as $product)
          <div class="box">

            <div class="img-box">
              <img src="{{ asset('images/' . $product->image) }}" alt="">
            </div>
            
            <div class="detail-box">

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

            </div> <!-- end .detail-box -->
            
          </div>
        @endforeach
      </div>

      <div class="mt-5">
        <a id="moreProducts" href="{{ route('products') }}">
          <span>
            MORE PRODUCTS
          </span>
          <img src="{{ asset('images/link-arrow.png') }}" alt="">
        </a>
      </div>
    </div>
      
    </div>
  </section>


  <!-- end food section -->

  <!-- about section -->

<section class="about_section layout_padding">
    <div class="container">
      <div class="detail-box">
        <div class="heading_container">
          <img src="{{ asset('images/heading-img.png') }}" alt="">
          <h2>
            About Us
          </h2>
        </div>
        <p>
          In a fair scenario, all dog nutrition would be the same.
          Instead, there is a bewildering variety of options available
          to dog owners, all of which claim to be the finest dog food
          here on market. Finding a dog food company that is nutritious,
          reasonably priced, and appealing to our pets can be difficult.
          To assist you in limiting your options, we have collated professional advice.
        </p>
        <div class="btn-box">
          <a href="{{ route('about') }}">
            <span>
              Read More
            </span>
            <img src="{{ asset('images/link-arrow.png') }}" alt="">
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- pet section -->

  <section class="pet_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="{{ asset('images/pet-img.png') }}" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <img src="{{ asset('images/heading-img.png') }}" alt="">
              <h2>
                Why get a dog?
              </h2>
            </div>
            <p>
              Love without conditions devoted friendship. perpetual
              entertainment The majority of dog lovers are aware that
              having a dog improves life. But is that information grounded
              in a gut instinct, or is there another factor at play? Science exists.
            </p>
            <p>
              Your health benefits greatly from time spent with canine companions.
              Owning a dog is excellent for you physically and mentally, according
              to recent studies. Dogs improve our well-being, help us deal with stress,
              and even assist us find love. Here are 10 advantages of owning a dog that
              science has backed up.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end pet section -->

  <!-- client section -->

  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <img src="{{ asset('images/heading-img.png') }}" alt="">
        <h2>
          What Our Customers Say?
        </h2>
        <p>
          Feedback from our loyal customers.
        </p>
      </div>
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="box">
              <div class="img-box">
                <img style="height: 10rem" src="{{ asset('images/client.jpg') }}" alt="">
              </div>
              <div class="detail-box">
                <h4>
                  Jack Mengo
                </h4>
                <p>
                  My dog really enjoys your food. Drool should be nominated for service of the year.
                </p>
                <img src="{{ asset('images/quote.png') }}" alt="">
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="img-box">
                <img style="height: 10rem" src="{{ asset('images/client2.jpg') }}" alt="">
              </div>
              <div class="detail-box">
                <h4>
                  Jane Doe
                </h4>
                <p>
                  The very best. My dog just can't get enough of your products. I want to get a T-Shirt with Drool on it so I can show it off to everyone.
                </p>
                <img src="{{ asset('images/quote.png') }}" alt="">
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="img-box">
                <img style="height: 10rem" src="{{ asset('images/client3.jpg') }}" alt="">
              </div>
              <div class="detail-box">
                <h4>
                  Lisa Adams
                </h4>
                <p>
                  Drool is the most valuable dog food seller. I STRONGLY recommend Drool to EVERYONE! I will recommend you to my colleagues.
                </p>
                <img src="{{ asset('images/quote.png') }}" alt="">
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

  <!-- contact section -->

  <section class="contact_section layout_padding-top">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5 offset-md-1">
          <div class="form_container">
            <div class="heading_container">
              <img src="{{ asset('images/heading-img.png') }}" alt="">
              <h2>
                Request A Call Back
              </h2>
              <p>
                It is a long established fact that a reader will be distracted by the
              </p>
            </div>
            <form action="">
              <div>
                <input type="text" placeholder="Full Name " />
              </div>
              <div>
                <input type="text" placeholder="Phone number" />
              </div>
              <div>
                <input type="email" placeholder="Email" />
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Message" />
              </div>
              <div class="d-flex ">
                <button>
                  SEND
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6 px-0">
          <div class="map_container">
            <div class="map-responsive">
              <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->

@endsection