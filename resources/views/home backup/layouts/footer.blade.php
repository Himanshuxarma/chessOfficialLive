<?php 
$settings = App\Helpers\Helper::getSettings();?>
<footer id="footer" class="section-bg change-background-color">
<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6 footer-contact">
        <h3>Contact US</h3>
        <p>
          <a class="conatct_anc" href="mailto:support@checssofficials.com">Contact us at: {{!empty($settings->email) ? $settings->email : 'info@w3esolutions.com'}}</a>
          <br>
          <a target="_blank" rel="noopener" class="conatct_anc" href="https://wa.me/{{!empty($settings->whatsapp_no) ? $settings->whatsapp_no : '+91 8005517323'}}">Click to chat with us<!-- --> <img alt="WhatsApp" width="24px" src="{{asset('/assets/front/img/whatsapp.png')}}"></a>
        </p>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Support links</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="{{route('faqsDeatail')}}">Faq's</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="{{route('class.guidelines')}}">Class Guidelines</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="{{route('terms.conditions')}}">T&C</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="{{route('privacy.policy')}}">Privacy Policy</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <p>ChessOfficials</p>
        <div class="social-links mt-3">
        @php
              $TwitterLink = isset($settings) && !empty($settings->twitter_link) ? $settings->twitter_link:'javascript:void(0);';
              $FBLink = isset($settings) && !empty($settings->facebook_link) ? $settings->facebook_link :'javascript:void(0);';
              $LinkedinLink = isset($settings) && !empty($settings->linkedin_link) ? $settings->linkedin_link:'javascript:void(0);';
              $InstagramLink = isset($settings) && !empty($settings->instagram_link) ? $settings->instagram_link:'javascript:void(0);';
              $GoogleLink = isset($settings) && !empty($settings->google_link) ? $settings->google_link:'javascript:void(0);';
            @endphp
          <a href="{{$FBLink}}" class="facebook change-background-color2 change-text-color3"><i class="bx bxl-facebook"></i></a>
          <a href="{{$TwitterLink}}" class="twitter change-background-color2 change-text-color3"><i class="bx bxl-twitter"></i></a>
          <a href="{{$InstagramLink}}" class="instagram change-background-color2 change-text-color3"><i class="bx bxl-instagram"></i></a>
          <a href="{{$LinkedinLink}}" class="linkedin change-background-color2 change-text-color3"><i class="bx bxl-linkedin"></i></a>
          <a href="{{$GoogleLink}}" class="google-plus change-background-color2 change-text-color3"><i class="bx bxl-google-plus"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 footer-links">
        <a href="{{url('/')}}">
                @php
                 $logo = !empty($settings) && !empty($settings->front_logo) ? $settings->front_logo : '';
                @endphp
            <img src="/uploads/settings/{{$logo}}" alt="{{$logo}}" width="68%" /></a>
      </div>

    </div>
  </div>
</div>

<div class="container footer-bottom clearfix">
  <div class="copyright">
    &copy; Copyright <strong><span>Chess official</span></strong>. All Rights Reserved
  </div>
  <div class="credits" style="display: none;">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
    Designed by <a href="https://www.w3esolutions.com/">W3eSolutions</a>
  </div>
</div>
</footer>
  <div id="preloader"></div> 
  <a target="_blank" rel="noopener" class="whatsapp-sider change-background-color3 change-text-color2" href="https://wa.me/{{!empty($settings->whatsapp_no)  ? $settings->whatsapp_no : '+91 8005517323'}}">
    <svg xmlns="http://www.w3.org/2000/svg" height="25px" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
    <span>Chat with us</span>
  </a>
