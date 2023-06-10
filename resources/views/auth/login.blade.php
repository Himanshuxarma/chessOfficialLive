@extends('front.layouts.master')
@section('content')
<!-- contact page start -->
<?php 
    $message = Session::get('loginError');
    if(isset($message) && !empty($message)){ 
  ?>
      <p class="alert alert-danger hide">
        {{ $message }}
      </p>
  <?php 
    }
  ?>
<section class="contact-details">
    <div class="form-left">
      <div class="form-heading"><h3>LOGIN if already having an account</h3></div>
      <form action="{{route('postLogin')}}" method="post" id="loginForm">
        {{ csrf_field() }}
        <div class="sc_contact_form sc_contact_form_contact">
          <div class="columns1 margin_top_mini margin_bottom_mini">
            <label for="loginEmail">Email</label>
            <input type="text" id="loginEmail" class="form-control" name="email" placeholder="Enter your email">
            @if ($errors->has('email'))
              <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
          </div>
          <div class="columns1 margin_top_mini margin_bottom_mini">
            <label for="loginPassword">Password</label>
            <input type="password" id="loginPassword" class="form-control" name="password" placeholder="Enter your password">
            @if ($errors->has('password'))
              <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
          </div>
        </div>
        <div class="registration-button squareButton light huge">
          <button type="submit" class="mt-4">Login</button>
        </div>
      </form>
    </div>

    <div class="vertical-line"></div> 
    
    <div class="form-right">
      <div class="form-heading"><h3>Get started with CHESSOFFICIAL</h3></div>
      <form action="{{route('register.post')}}" method="post" autocomplete="off">
        {{ csrf_field() }}
        <div class="sc_contact_form sc_contact_form_contact">
          <div class="columns1 margin_top_mini margin_bottom_mini">
            <label for="signup_full_name">Full Name</label>
            <input type="text" id="signup_full_name" class="form-control" name="full_name" placeholder="Enter your full name">
            @if ($errors->has('full_name'))
              <span class="text-danger">{{ $errors->first('full_name') }}</span>
            @endif
          </div>
          <div class="columns1 margin_top_mini margin_bottom_mini">
            <label for="register_email">Email</label>
            <input type="text" id="register_email" class="form-control" name="register_email" placeholder="Enter your email">
            @if ($errors->has('register_email'))
              <span class="text-danger">{{ $errors->first('register_email') }}</span>
            @endif
          </div>
          <div class="columns1 margin_top_mini margin_bottom_mini">
            <label for="signup_password">Password</label>
            <input type="password" id="signup_password" class="form-control" name="register_password" placeholder="Enter your password">
            @if ($errors->has('register_password'))
              <span class="text-danger">{{ $errors->first('register_password') }}</span>
            @endif
          </div>
          <div class="columns1 margin_top_mini margin_bottom_mini">
            <label for="signup_phone">Phone</label>
            <input type="text" id="signup_phone" class="form-control" name="phone" placeholder="Enter your phone number">
            @if ($errors->has('phone'))
              <span class="text-danger">{{ $errors->first('phone') }}</span>
            @endif
          </div>
        </div>
        <div class="registration-button squareButton light huge">
            <button type="submit" class="mt-4">Registration</button>
        </div>
      </form>
    </div>
</section>
@endsection
