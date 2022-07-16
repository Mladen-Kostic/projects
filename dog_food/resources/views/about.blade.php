@extends('layouts.main2')

@section('content')

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
          to dog owners, all of which claim to be the finest dog food here
          on market. Finding a dog food company that is nutritious, reasonably
          priced, and appealing to our pets can be difficult. To assist you in
          limiting your options, we have collated professional advice.
        </p>
        <h2>
          What Characterizes "Good" dog food?
        </h2>
        <p>
          Dogs are typically fed dry kibble or wet food in cans. Although we may
          not find these processed foods to be tasty, dogs can get all the nutrients
          they require to keep healthy from them. Veterinary experts have subjected
          high-quality commercial dog diets to extensive testing and regulation. What
          precisely are these dog snacks made of then?
        </p>
        <p>
          Dogs are not strictly carnivores like cats are. Domestic dogs can obtain
          nutrition from cereals, fruits, and vegetables in addition to the meat that
          makes up a large portion of their diet. These vegetarian and vegan foods can
          be a useful source of nutrients, vitamins, and minerals in addition to serving
          as fillers. Meat, fruits, grains, and vegetables make up a high-quality dog meal.
          High-quality variations of these components that are suitable for your dog's
          digestive system can be found in the best dog foods.
        </p>
        <h2>How much food ought I to give my dog?</h2>
        <p>
          Dog obesity is a significant issue in the veterinary field and has been associated
          with a variety of health issues in canines. For the benefit of our furry friends, we
          are typically more strict about monitoring their diets than we are about monitoring
          our own. It might be difficult to gauge how much food to give your dog and what a
          healthy canine weight should be. Many pet owners unintentionally overfeed their animals,
          so it's crucial to take your dog in for frequent examinations and discuss portion sizes
          with your veterinarian. The instructions on the bag's back are simply that: instructions.
          Some dogs could need more than what is advised, while others might need a lot less. Activity
          level, season, nursing, illness, and other variables can all have an impact.
        </p>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- us section -->

  <section class="us_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <img src="{{ asset('images/heading-img.png') }}" alt="">
        <h2>
          Why Choose Us
        </h2>
        <p>
          We have the best nutritions, standards, quality and safety.
        </p>
      </div>
      <div class="us_container">
        <div class="box">
          <div class="img1-box">
            <img src="{{ asset('images/pet1.png') }}" alt="">
          </div>
          <div class="img2-box">
            <img src="{{ asset('images/omega.png') }}" alt="">
          </div>
          <div class="detail-box">
            <h6>
              PET NUTRITIONISTS
            </h6>
          </div>
        </div>
        <div class="box">
          <div class="img1-box">
            <img src="{{ asset('images/pet2.png') }}" alt="">
          </div>
          <div class="img2-box">
            <img src="{{ asset('images/dog.png') }}" alt="">
          </div>
          <div class="detail-box">
            <h6>
              STANDARDS
            </h6>
          </div>
        </div>
        <div class="box">
          <div class="img1-box">
            <img style="height: 17rem;" src="{{ asset('images/dog_house.png') }}" alt="">
          </div>
          <div class="img2-box">
            <img src="{{ asset('images/shield.png') }}" alt="">
          </div>
          <div class="detail-box">
            <h6>
              QUALITY & SAFETY
            </h6>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end us section -->

@endsection