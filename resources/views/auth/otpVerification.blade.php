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
      <form action="{{ route('otp.getlogin') }}" method="post" id="loginForm">
        <div class="form-heading"><h3>Never share your OTP with anyone </h3></div>
        {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{$user_id}}" />
        <div class="sc_contact_form sc_contact_form_contact">
          <div class="columns1 w-full margin_top_mini margin_bottom_mini">
            <label for="otp">Otp</label>
            <input type="text" id="otp" class="form-control" name="otp" placeholder="Enter your otp">
            <span class="text-danger" id="otpError"></span>
          </div>
        </div>
        <div class="d-flex">
          <div class="registration-button squareButton light">
            <button type="submit" id="loginSubmit" class="mt-4">Login</button>
          </div>
        </div>
        
      </form>
    </div>
   
    
</section>
@endsection
@section('customscript')
@endsection
