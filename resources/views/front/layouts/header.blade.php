<?php 
$countries = App\Helpers\Helper::getCountry();
$settings = App\Helpers\Helper::getSettings();
?>
<header class="noFixMenu menu_right without_user_menu">
    <div class="topWrapFixed"></div>
    <div class="topWrap">
        <div class="mainmenu_area">
            <div class="main with_logo_left">
                <div class="logo logo_left">
                    <a href="{{url('/')}}">\
                        @php
                             $headerLogo = !empty($settings) && !empty($settings->header_logo) ? $settings->header_logo : '';
                        @endphp
                        <img src="/uploads/settings/{{$headerLogo}}" class="logo_main" alt="">
                        <img src="/uploads/settings/{{$headerLogo}}" class="logo_fixed" alt="">
                        <span class="logo_slogan"></span>
                    </a>
                </div>
              
                <a href="javascript:void();" class="openResponsiveMenu">Menu</a>
                <nav role="navigation" class="menuTopWrap d-flex align-items-center topMenuStyleLine">
                    <ul id="mainmenu" class="">
                        <li class="{{Request::path() =='/' ? 'current-menu-ancestor' : ''}} menu-item">
                            <a href="{{url('/')}}">Home</a>
                        </li>

                        <li class="{{Request::path() == 'course' ? 'current-menu-ancestor' : '' }} menu-item">
                            <a title="Layouts and hovers" href="{{route('courseList')}}">
                                <span class="menu_icon icon-thumbs-up"></span>
                                Courses
                            </a>
                        </li>
                        <li class="{{Request::path() =='faqs' ? 'current-menu-ancestor' : ''}} menu-item">
                            <a title="Layouts and hovers" href="{{route('faqsDeatail')}}">
                                <span class="menu_icon icon-thumbs-up"></span>
                                Faq
                            </a>
                        </li>
                        <li class="{{Request::path() =='contact-us' ? 'current-menu-ancestor' : ''}} menu-item">
                            <a title="Layouts and hovers" href="{{route('contactForm')}}">
                                <span class="menu_icon icon-thumbs-up"></span>
                                Contact Us
                            </a>
                        </li>
                        <li class="{{Request::path()== 'pages/about-us' ? 'current-menu-ancestor' : ''}} menu-item">
                            <a title="Layouts and hovers" href="{{route('about.us')}}">
                                <span class="menu_icon icon-thumbs-up"></span>
                                About-Us
                            </a>
                        </li>
                        
                    </ul>
					<div class="menu-item country-wrap">
						<div class="selected-country"><img alt="" src="{{asset('assets/front/images/india.png')}}">IN</div>
						<div class="country-listing">
							<ul>
                            @if(!empty($countries))
                                @foreach($countries as $country)
								<li><img alt="" src="/uploads/country/{{$country->country_flag}}">{{$country->country_code}}</li>
								@endforeach
                                @endif
							</ul>
						</div>
				    </div>
                </nav>

				

            </div>
		
        </div>
    </div>
</header>
