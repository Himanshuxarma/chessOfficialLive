<!DOCTYPE html>
<html lang="en-US">
<!-- head start  -->
@include('front.layouts.head')
<!-- head End  -->

<body class="{{Request::is('/') ? 'home page themerex_body fullscreen top_panel_above theme_skin_learnplay' : 'archive category wide theme_skin_kidscare'}}">
	<!--[if lt IE 9]>
		<div class="sc_infobox sc_infobox_style_error">
	<div style="text-align:center;">It looks like you're using an old version of Internet Explorer. For the best experience, please <a href="http://microsoft.com" style="color:#191919">update your browser</a> or learn how to <a href="http://browsehappy.com" style="color:#222222">browse happy</a>!</div>
	</div>	<![endif]-->
	<div class="main_content">
		<div class="boxedWrap">
		<!-- header start -->
    @include('front.layouts.header')
    <!-- header end  -->

			<!-- Banner Start -->
			<?php
    if(Request::is('/')) {
      
    ?>
@include('front.layouts.banner')
<?php
    }
    ?>
			<!-- Banner End -->

      <!-- Main Content Start  -->
      @yield('content')
      <!-- Main Content End  -->

			

			<!-- footer start  -->
      @include('front.layouts.footer')
      <!-- footer End  -->

		</div> 
	</div> 

	<div class="upToScroll">
		<a href="#" class="addBookmark icon-star-empty" title="Add the current page into bookmarks"> </a>
		<a href="#" class="scrollToTop icon-up-open-big" title="Back to top"> </a>
	</div>

<!-- foot start  -->\
@include('front.layouts.foot')
<!-- foot end  -->

</body>
</html>