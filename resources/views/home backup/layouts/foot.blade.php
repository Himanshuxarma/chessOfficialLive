
  <!-- Vendor JS Files -->
  <script> var ajaxUrl = "{{url('/')}}"; </script>
  <script src="{{asset('/assets/front/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('/assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('/assets/front/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('/assets/front/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('/assets/front/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('/assets/front/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('/assets/front/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('/assets/front/vendor/bootstrap/js/bootstrap-4.5.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <!-- Template Main JS File -->
  <script src="{{asset('/assets/front/js/main.js')}}"></script>
  <script>
    jQuery(document).on('change', '.change_country', function(){
      let countrySelected = jQuery(this).data('language');
      alert(countrySelected);
    });
  </script>
  @yield('customscript')