	
  
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <{{-- div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
 --}}
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-contact">
            <h3>Tirupati Finance</h3>
            <p>
               <br><br>
               <strong>Address:</strong>
               {{APPADDRESS}}
               <br>
              <strong>Phone:</strong> {{APPMOBILE}}<br>
              <strong>Email:</strong> 
              {{APP_EMAIL}}
              {{-- <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b7ded9d1d8f7d2cfd6dac7dbd299d4d8da">[email&#160;protected]</a><br> --}}
            </p>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="fa fa-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="fa fa-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="fa fa-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="fa fa-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="fa fa-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          {{-- <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div> --}}

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            {{-- <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p> --}}
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-skype"></i></a>
              {{-- <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> --}}
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        Copyright &copy; 2020 <strong><span>{{APPWEBSITE}}</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
   
        Designed by @Riteshpanchal845</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
  <div id="preloader"></div>


  <!-- js JS Files -->
  <script data-cfasync="false" src="{{asset('js/cloudflare-static/email-decode.min.js')}}"></script>
  <script src="{{asset('js/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('js/php-email-form/validate.js')}}"></script>
  <script src="{{asset('js/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('js/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('js/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('js/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('js/main.js')}}"></script>

  <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
  </script>
{{-- 
	<script>if( window.self == window.top ) { (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','//www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-55234356-4', 'auto'); ga('send', 'pageview'); } </script> --}}


</body>
</html>