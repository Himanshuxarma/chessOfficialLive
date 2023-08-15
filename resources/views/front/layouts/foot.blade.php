<script> var ajaxUrl = "{{url('/')}}"; </script>
<script type='text/javascript' src='{{asset("assets/front/js/vendor/jquery-1.11.3.min.js")}}'></script>
<script type='text/javascript' src='{{asset("assets/front/js/owl.carousel.min.js")}}'></script>
<script type='text/javascript' src='{{asset("assets/front/js/vendor/jquery-migrate.min.js")}}'></script>
<script type='text/javascript' src='{{asset("assets/front/js/vendor/revslider/rs-plugin/js/jquery.themepunch.tools.min.js")}}'></script>
<script type='text/javascript' src='{{asset("assets/front/js/vendor/revslider/rs-plugin/js/jquery.themepunch.revolution.min.js")}}'></script>
<script type='text/javascript' src='{{asset("assets/front/js/custom/__main.js")}}'></script>
<script type='text/javascript' src='{{asset("assets/front/js/vendor/__packed.js")}}'></script>
<!--<script type='text/javascript' src='js/vendor/SmoothScroll.min.js'></script>-->
<script type='text/javascript' src='{{asset("assets/front/js/custom/shortcodes_init.js")}}'></script>
<script type='text/javascript' src='{{asset("assets/front/js/custom/_utils.js")}}'></script>
<script type='text/javascript' src='{{asset("assets/front/js/custom/_front.js")}}'></script>
<script type='text/javascript' src="{{asset('assets/front/js/vendor/diagram/diagram.raphael.min.js')}}"></script>

<!--<script type='text/javascript' src='custom_tools/js/_customizer.js'></script>-->
<script>
    jQuery(document).on('change', '.change_country', function(){
        let countrySelected = jQuery(this).data('language');
    });
</script>

<script type='text/javascript' src="{{asset('/custom/assets/js/toastr.min.js')}}"></script>
<script type='text/javascript' src="{{asset('/custom/assets/js/sweetalert-dev.js')}}"></script>



 
<script>
  $('.hero-slider').owlCarousel({
    loop:true,
    autoplay:true,
    margin:0,
    items:1,
    nav:true
});

$('.testimonials').owlCarousel({
    loop:true,
    autoplay:true,
    margin:20,
    items:3,
    dots:false,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
});
</script>


@yield('customscript')