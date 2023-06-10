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
                        @if(Auth::guard('customer')->check())
                            <li class="{{Request::path() =='login' ? 'current-menu-ancestor' : ''}} login menu-item">
                                <a title="Layouts and hovers" href="javascript:void(0);">
                                    <img src="{{asset('assets/front/images/kid_avatar.png')}}" width="40px" height="40px"/>
                                </a>
                                <ul class="sub-menu">
                                    <li class="menu-item">
                                        <a href="{{route('front.dashboard')}}">Dashbaord</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{route('webLogout')}}">
                                            <span class="menu_icon icon-thumbs-up"></span>
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="{{Request::path() =='login' ? 'current-menu-ancestor' : ''}} login menu-item">
                                <a title="Layouts and hovers" href="{{route('frontLogin')}}">
                                    <span class="menu_icon icon-thumbs-up"></span>
                                    Login
                                </a>
                            </li>
                        @endif
                    </ul>
                    @php
                        $countryId = 6;
                        if(session()->has('SiteCountry')){
                            $countryId = session()->get('SiteCountry');
                        }
                        $countryDetails = App\Helpers\Helper::getCountryData($countryId);
                        $countryFlag = !empty($countryDetails->country_flag) ? $countryDetails->country_flag : '';
                    @endphp
                    <div class="menu-item country-wrap">
                        <div class="selected-country">
                            <a href="javascript:void(0);" id="selectedCountry"data-country-id="{{isset($countryDetails->id) ? $countryDetails->id : 1}}" class="d-flex">
                                <img alt="" src="/uploads/country/{{$countryFlag}}">
                                {{!empty($countryDetails->country_code) ? $countryDetails->country_code : 'USA'}}
                            </a>
                        </div>
                        <div class="country-listing">
                            <ul>
                            @if(!empty($countries))
                                @foreach($countries as $country)
                                <li> <a href="javascript:void(0);"  class="change_country d-flex" data-country-id="{{$country->id}}"><img alt="" src="/uploads/country/{{$country->country_flag}}">{{$country->country_code}}</a></li>
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
