<!-- info section -->
<section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-4">
          <div class="info_contact">
            <h5>
              CONTACT INFO
            </h5>
            <div>
              <img src="{{ asset('images/call.png') }}" alt="" />
              <p>
                +01 1234567890
              </p>
            </div>
            <div>
              <img src="{{ asset('images/mail.png') }}" alt="" />
              <p>
                demo@gmail.com
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="info_time">
            <h5>
              Opening Hours Shop
            </h5>
            <div>
              <p>
                Monday to friday
              </p>
            </div>
            <div>
              <p>
                07:00 am to 04:00 pm
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="info_social">
            <h5>
              social media
            </h5>
            <div class="social_container">
              <div>
                <a href="">
                  <img src="{{ asset('images/fb.png') }}" alt="" />
                </a>
              </div>
              <div>
                <a href="">
                  <img src="{{ asset('images/twitter.png') }}" alt="" />
                </a>
              </div>
              <div>
                <a href="">
                  <img src="{{ asset('images/linkedin.png') }}" alt="" />
                </a>
              </div>
              <div>
                <a href="">
                  <img src="{{ asset('images/instagram.png') }}" alt="" />
                </a>
              </div>
            </div>
          </div>
        </div>
      
      </div>
    </div>
  </section>

  <!-- end info_section -->


  <!-- footer section -->
  <section class="container-fluid footer_section ">
    <p>
      &copy; {{ date('Y') }} All Rights Reserved.
    </p>
  </section>
  <!-- end  footer section -->


  <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  <script>
    function openNav() {
      document.getElementById("myNav").classList.toggle("menu_width");
      document.querySelector(".custom_menu-btn").classList.toggle("menu_btn-style");
      document.querySelector('.search').classList.toggle('nav_merge');
    }
  </script>

</body>

</html>