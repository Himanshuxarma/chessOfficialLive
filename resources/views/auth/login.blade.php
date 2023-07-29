@extends('front.layouts.master')
@section('content')
<!-- contact page start -->
<?php 
  $errorMessage = Session::get('loginError');
  $successMessage = Session::get('successMessage');
  if(isset($errorMessage) && !empty($errorMessage)){ 
?>
    <p class="alert alert-danger hide">{{ $errorMessage }}</p>
<?php 
  }
  if(isset($successMessage) && !empty($successMessage)){
?>
  <p class="alert alert-success hide">{{ $successMessage }}</p>
<?php
  }
?>
<section class="contact-details main">
  
    <div class="form-left" id="login-side">
      <form action="{{route('postLogin')}}" method="post" id="loginForm">
        <div class="form-heading"><h3>LOGIN if already having an account</h3></div>
        {{ csrf_field() }}
        <div class="sc_contact_form sc_contact_form_contact">
          <div class="columns1 w-full margin_top_mini margin_bottom_mini">
            <label for="loginEmail">Email</label>
            <input type="text" id="loginEmail" class="form-control" name="email" placeholder="Enter your email">
            <span class="text-danger" id="loginEmailError"></span>
          </div>
          <div class="columns1 w-full margin_top_mini margin_bottom_mini">
            <label for="loginPassword">Password</label>
            <input type="password" id="loginPassword" class="form-control" name="password" placeholder="Enter your password">
            <span class="text-danger" id="loginPasswordError"></span>
          </div>
        </div>
        <div class="d-flex">
          <div class="registration-button squareButton light">
            <button type="button" id="loginSubmit" class="mt-4">Login</button>
          </div>
          <div class="registration-button squareButton light">
            <button type="button" id="forgotPasswordFormLink" class="alignright">Forgot Password</button>
          </div>
        </div>
        <div class="d-flex">
          <div class="registration-button">
            <a href="javascript:void(0);" id="mobileLoginFormLink" >Mobile With Login</a>
          </div>
          <div class="registration-button">
            <a href="{{ url('redirect/google') }}">Google Login</a>
          </div>
          <div class="registration-button">
            <a href="{{ url('redirect/facebook') }}">Facebook Login</a>
          </div>
        </div>
        
      </form>

      <form action="{{route('postForgotPassword')}}" method="post" id="forgotPasswordForm" class="d-none">
        <div class="form-heading"><h3>Enter your email to get Reset Password link</h3></div>
        {{ csrf_field() }}
        <div class="sc_contact_form sc_contact_form_contact">
          <div class="columns1 w-full margin_top_mini margin_bottom_mini">
            <label for="forgotEmail">Email Address</label>
            <input type="text" id="forgotEmail" class="form-control" name="email" placeholder="Enter your email">
            @if ($errors->has('email'))
              <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
          </div>
        </div>
        <div class="d-flex">
          <div class="registration-button squareButton light">
            <button type="submit" class="mt-4">Send Request</button>
          </div>
          <div class="registration-button squareButton light">
              <button type="button" id="loginFormLink" class="alignright">Login</button>
          </div>
        </div>
      </form>
<!-- mobile -->
      <form action="{{route('otp.generate')}}" method="post" id="mobileLoginForm" class="d-none">
        <div class="form-heading"><h3>Enter your mobile to get Otp</h3></div>
        {{ csrf_field() }}
        <div class="sc_contact_form sc_contact_form_contact">
          <div class="columns1 w-full margin_top_mini margin_bottom_mini">
            <label for="mobilephone">Mobile</label>
            <input type="text" id="mobilephone" class="form-control" name="phone" placeholder="Enter your Mobile">
            @if ($errors->has('phone'))
              <span class="text-danger">{{ $errors->first('phone') }}</span>
            @endif
          </div>
        </div>
        <div class="d-flex">
          <div class="registration-button squareButton light">
            <button type="submit" class="mt-4">Send Otp</button>
          </div>
          <div class="registration-button squareButton light">
              <button type="button" id="loginFormLink" class="alignright">Login</button>
          </div>
        </div>
      </form>
    </div>

    <div class="vertical-line"></div> 
    <div class="form-right">
      <form action="{{route('register.post')}}" method="post" autocomplete="off">
        {{ csrf_field() }}
        <input type="hidden" name="referral_code" value="{{$referral_code ? $referral_code : ''}}">
        <input type="hidden" name="referee_email" value="{{$referee_email ? $referee_email : ''}}">
        <div class="form-heading"><h3>Get started with CHESSOFFICIAL</h3></div>
        <div class="sc_contact_form sc_contact_form_contact">
          <div class="columns1 w-full margin_top_mini margin_bottom_mini">
            <label for="signup_full_name">Full Name</label>
            <input type="text" id="signup_full_name" class="form-control" name="full_name" placeholder="Enter your full name">
            @if ($errors->has('full_name'))
              <span class="text-danger">{{ $errors->first('full_name') }}</span>
            @endif
          </div>
          <div class="columns1 w-full margin_top_mini margin_bottom_mini">
            <label for="register_email">Email</label>
            <input type="text" id="register_email" class="form-control" name="email" placeholder="Enter your email">
            @if ($errors->has('email'))
              <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
          </div>
          <div class="columns1 w-full margin_top_mini margin_bottom_mini">
            <label for="signup_password">Password</label>
            <input type="password" id="signup_password" class="form-control" name="register_password" placeholder="Enter your password">
            @if ($errors->has('register_password'))
              <span class="text-danger">{{ $errors->first('register_password') }}</span>
            @endif
          </div>
          <div class="columns1 w-full margin_top_mini margin_bottom_mini">
            <label for="signup_phone">Phone</label>
            <input type="text" id="signup_phone" class="form-control" name="phone"minlength="10" maxlength="10" onkeypress="return isNumberKey(event)" placeholder="Enter your phone number">
            @if ($errors->has('phone'))
              <span class="text-danger">{{ $errors->first('phone') }}</span>
            @endif
          </div>
        </div>
        <div class="registration-button squareButton light">
            <button type="submit" class="mt-4">Sign UP</button>
        </div>
      </form>
    </div>
    
</section>
@endsection
@section('customscript')
<script>
  localStorage.clear();
  function isNumberKey(evt) {
      var charCode = (evt.which) ? evt.which : evt.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;
      return true;
    }

  jQuery(document).on('cli`ck', '#forgotPasswordFormLink', function(){
    jQuery('#loginForm').addClass('d-none');
    jQuery('#forgotPasswordForm').removeClass('d-none');
  });
  jQuery(document).on('click', '#loginFormLink', function(){
    jQuery('#forgotPasswordForm').addClass('d-none');
    jQuery('#loginForm').removeClass('d-none');
  });
  jQuery(document).on('click', '#mobileLoginFormLink', function(){
    jQuery('#loginForm').addClass('d-none');
    jQuery('#mobileLoginForm').removeClass('d-none');
  });
  jQuery(document).on('click', '#loginFormLink', function(){
    jQuery('#mobileLoginForm').addClass('d-none');
    jQuery('#loginForm').removeClass('d-none');
  });
  

  jQuery(document).on('click', '#loginSubmit', function(){
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    let submitForm = true;
    if(!jQuery('#loginEmail').val()){
      jQuery('#loginEmailError').html('email is required');
      submitForm = false;
    } else if(!regex.test(jQuery('#loginEmail').val())){
      jQuery('#loginEmailError').html('Please enter a valid email address');
      submitForm = false;
    } else {
      jQuery('#loginEmailError').html('');
      if(!jQuery('#loginPassword').val()){
        jQuery('#loginPasswordError').html('password is required');
        submitForm = false;
      } else {
        jQuery('#loginPasswordError').html('');
        submitForm = true;
      }
    }
    if(submitForm){
      jQuery('#loginForm').submit();
    }
  });

</script>
@endsection
