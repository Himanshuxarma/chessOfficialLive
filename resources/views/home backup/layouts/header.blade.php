<?php 
$countries = App\Helpers\Helper::getCountry();
$fontUser = Auth::guard('customer')->user();
$settings = App\Helpers\Helper::getSettings();
?>

<header id="header" class="{{Request::is('/') ? 'fixed-top' : 'header-inner-pages'}} change-background-color">
    <div class="container d-flex align-items-center">
             @php
                 $logo = !empty($settings) && !empty($settings->header_logo) ? $settings->header_logo : '';
                @endphp
      <h1 class="logo me-auto"><a href="{{url('/')}}" ><img class="img-fluid" src="/uploads/settings/{{$logo}}" ></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/front/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li class="dropdown">
            @php
              $countryId = 6;
              if(session()->has('SiteCountry')){
                $countryId = session()->get('SiteCountry');
              }
              $countryDetails = App\Helpers\Helper::getCountryData($countryId);
              $countryFlag = !empty($countryDetails->country_flag) ? $countryDetails->country_flag : '';
            @endphp
            <a class="getstarted change-border-color1" id="selectedCountry" href="javascript:void(0);" data-country-id="{{isset($countryDetails->id) ? $countryDetails->id : 1}}">
              <span><img width="24px" src="/uploads/country/{{$countryFlag}}"> {{!empty($countryDetails->country_code) ? $countryDetails->country_code : 'USA'}}</span> 
              <i class="bi bi-chevron-down"></i>
            </a>
            <ul class="countryList">
              @if(!empty($countries))
                @foreach($countries as $country)
                <li class="dropdown"><a href="javascript:void(0);" class="change_country" data-country-id="{{$country->id}}" ><span><img width="24px" src="/uploads/country/{{$country->country_flag}}"> {{$country->country}}</span>  </a></li>
                @endforeach
              @endif
            </ul>
          </li>
          @if(Auth::guard('customer')->check())
            <li class="dropdown">
              <a class="nav-link scrollto" data-toggle="dropdown" href="javascript:void(0);">
              @php $userImg = asset('/assets/front/img/man.png'); @endphp
                            @if(file_exists(public_path('public/uploads/customer/').$fontUser->user_image))
                            @php $userImg = asset('/public/uploads/customer').'/'.$fontUser->user_image; @endphp
                            @endif
                <img class="rounded-circle me-lg-2" src="{{$userImg}}" alt="{{$fontUser->full_name}}" style="width: 40px; height: 40px;"></a>
                <ul>
                  <a href="{{route('front.dashboard')}}" class="dropdown-item">My Profile</a>
                  <a href="{{route('webLogout')}}" class="dropdown-item">Log Out</a>
                </ul>
            </li>
          @else
            <li><a class="nav-link" data-toggle="modal" data-target="#modalLoginForm" href="javascript:void(0);">Login</a></li>
          @endif
         
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>