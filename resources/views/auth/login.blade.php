<?php $settings = App\Helpers\Helper::getSettings(); ?>
@extends('admin.layouts.master')
@section('customstyle')
@endsection
@section('content')
<div class="login-box">
  <div class="login-logo">
  <a href="javascript:void(0);" class="brand-link">
                 @php
                 $logo = !empty($settings) && !empty($settings->back_logo) ? $settings->back_logo : '';
                @endphp
        <img src="/uploads/settings/{{$logo}}" alt="{{$logo}}" width="100%" ></a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
          {{ Session::get('message') }}
        </div>
      @endif
      @if ($message = Session::get('success'))
        <p class="alert alert-success hide1 ">
            {{ $message }}
        </p>
      @elseif ($message = Session::get('error'))
        <p class="alert alert-danger hide1 ">
            {{ $message }}
        </p>
      @endif
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{route('adminLogin')}}" method="post">
      {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="email"name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password"class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="{{route('forget.password.get')}}" class="btn btn-block btn-primary">
        Forgot Password
        </a>
       
      </div>
     </div>
  </div>
</div>

@endsection
@section('customscript')
@endsection