<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Drool</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')  }}" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
</head>

<body>
  <div class="hero_area ">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="">
          </a>
          <div class="" id="">
            <!-- <div class="User_option">
              <form class="form-inline my-2  mb-3 mb-lg-0">
                <input type="search" placeholder="Search">
                <button class="btn   my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div> -->

            <!-- New Search button -->

            <div class="search">
              <div class="icon"></div>
              <div class="input">
                  <form action="{{ route('products') }}">
                    <input name="filter" type="text" id="mysearch" placeholder="Search Products">
                    <input type="submit" hidden>
                  </form>
              </div>
              <span class="clear" onclick="document.getElementById('mysearch').value=''"></span>
            </div>

            <!-- end new search button -->

            <div class="custom_menu-btn">
              <button onclick="openNav()">
                <span class="s-1">

                </span>
                <span class="s-2">

                </span>
                <span class="s-3">

                </span>
              </button>
            </div>
            <div id="myNav" class="overlay">
              <div class="overlay-content">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('products') }}">Products</a>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section mt-10">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-5 offset-md-1 p-2">
                  <div class="detail-box">
                    <div class="number">
                      <h5>
                        01
                      </h5>
                    </div>
                    <h1>
                      <span style="color: #0a2050;">Drool</span> <br>
                      <span>
                        Best Food For Your Pet
                      </span>
                    </h1>
                    <p  style="color: #0a2050;">
                    Welcome to Drool! We have everithing to make your pet happy.
                    </p>
                    <div class="btn-box">
                      <a href="{{ route('products') }}" class="btn-2">
                        See Products
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img style="height: 34rem" src="{{ asset('images/test.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-5 offset-md-1 p-2">
                  <div class="detail-box">
                    <div class="number">
                      <h5>
                        02
                      </h5>
                    </div>
                    <h1>
                      <span style="color: #0a2050;">Drool</span><br>
                      <span>
                        Puppy
                      </span>
                    </h1>
                    <p style="color: #0a2050;">
                      Incredible food for the puppy's best health.
                      Full of Flavours, Less Calories.
                    </p>
                    <div class="btn-box">
                      <a href="{{ route('products') }}" class="btn-2">
                        See Products
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img style="height: 34rem" src="{{ asset('images/test2.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-5 offset-md-1 p-2">
                  <div class="detail-box">
                    <div class="number">
                      <h5>
                        03
                      </h5>
                    </div>
                    <h1>
                      <span style="color: #0a2050;">Drool</span> <br>
                      <span>
                        Naturally Balanced for all
                      </span>
                    </h1>
                    <p style="color: #0a2050;">
                      Choose Best, Live Longer.
                      Fit for every pet, keeping them healthy.
                    </p>
                    <div class="btn-box">
                      <a href="{{ route('products') }}" class="btn-2">
                        Products
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img style="height: 34rem" src="{{ asset('images/test3.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <!-- <li data-target="#carouselExampleIndicators" data-slide-to="3"></li> -->
        </ol>

      </div>

      

    </section>
    <!-- end slider section -->
  </div>