<head>
        <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '937282134018304');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=937282134018304&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <title>ChessOfficial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/front/images/favicon5.png')}}"/>
    <!--[if lt IE 9]>
            <script src="js/vendor/html5.js" type="text/javascript"></script>
    <![endif]-->
    <link rel='stylesheet' href='{{asset("assets/front/js/vendor/revslider/rs-plugin/css/settings.css")}}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{asset("assets/front/css/__packed.css")}}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{asset("assets/front/css/fontello/css/fontello.css")}}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{asset("assets/front/css/fontello/css/animation.css")}}' type='text/css' media='all'/>

    <link rel='stylesheet' href='{{asset("assets/front/css/owl.carousel.min.css")}}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{asset("assets/front/css/owl.theme.default.min.css")}}' type='text/css' media='all'/>

    <link rel='stylesheet' href='{{asset("assets/front/css/style.css")}}' type='text/css' media='all'/>
    
    <link rel='stylesheet' href='{{asset("assets/front/css/shortcodes.css")}}' type='text/css' media='all'/>
    <link id="theme-skin-css" rel='stylesheet' href='{{asset("assets/front/css/learnplay.css")}}' type='text/css' media='all'/>
    <link id="theme-skin-css" rel='stylesheet' href='{{asset("assets/front/css/kidscare.css")}}' type='text/css' media='all'/>
    <style id='theme-skin-inline-css' type='text/css'></style>
    <link rel='stylesheet' href='{{asset("assets/front/css/responsive.css")}}' type='text/css' media='all'/>
    

    <link rel='stylesheet' href='{{asset("/custom/assets/css/toastr.min.css")}}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{asset("/custom/assets/css/sweetalert.css")}}' type='text/css' media='all'/>

    <link rel='stylesheet' href='{{asset("assets/front/css/developer.css")}}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{asset("assets/front/css/developer-responsive.css")}}' type='text/css' media='all'/>
    <script type='text/javascript' src='{{asset("assets/front/js/vendor/jquery-1.11.3.min.js")}}'></script>

  

    @yield('customstyle')
</head>