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
                    <a href="{{url('/')}}">
                        <img src="{{asset('assets/front/images/logo.png')}}" alt="logo" />
                    </a>
                </div>
              <div class="head-right">
                <a href="javascript:void();" class="openResponsiveMenu">
                <svg height="32px" id="Layer_1" style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg>
                </a>
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
                        <li class="{{Request::path()== 'pages/about-us' ? 'current-menu-ancestor' : ''}} menu-item">
                            <a title="Layouts and hovers" href="{{route('about.us')}}">
                                <span class="menu_icon icon-thumbs-up"></span>
                                About Us
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
                </nav>
                @php
                    $countryId = 6;
                    if(session()->has('SiteCountry')){
                        $countryId = session()->get('SiteCountry');
                    }
                    $countryDetails = App\Helpers\Helper::getCountryData($countryId);
                    $countryFlag = !empty($countryDetails->country_flag) ? $countryDetails->country_flag : '';
                @endphp
                <div class="country-wrap otherLayouts">
                    <div class="selected-country">
                        <a href="javascript:void(0);" id="selectedCountry"data-country-id="{{isset($countryDetails->id) ? $countryDetails->id : 1}}" class="d-flex">
                            <img alt="" src="/uploads/country/{{$countryFlag}}">
                            {{!empty($countryDetails->country_code) ? $countryDetails->country_code : 'US'}}
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
                <!-- <div class="mobile country-wrap d-none">
                    <div class="selected-country">
                        <a href="javascript:void(0);" id="selectedCountry"data-country-id="{{isset($countryDetails->id) ? $countryDetails->id : 1}}" class="d-flex">
                            <img alt="" src="/uploads/country/{{$countryFlag}}">
                        </a>
                    </div>
                    <div class="country-listing">
                        <ul>
                        @if(!empty($countries))
                            @foreach($countries as $country)
                            <li> <a href="javascript:void(0);" class="change_country d-flex" data-country-id="{{$country->id}}"><img alt="" src="/uploads/country/{{$country->country_flag}}">{{$country->country_code}}</a></li>
                            @endforeach
                        @endif
                        </ul>
                    </div>
                </div> -->
            </div>
            </div>
        </div>
    </div>
</header>
