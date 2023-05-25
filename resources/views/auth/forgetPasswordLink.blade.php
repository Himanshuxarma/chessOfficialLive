<?php $settings = App\Helpers\Helper::getSettings(); ?>
@extends('admin.layouts.master')
@section('customstyle')
@endsection
@section('content')
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
    <a href="javascript:void(0);" class="brand-link">
                 @php
                 $logo = !empty($settings) && !empty($settings->back_logo) ? $settings->back_logo : '';
                @endphp
        <img src="/uploads/settings/{{$logo}}" alt="{{$logo}}" width="100%" ></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
      <form action="{{ route('postAdminResetPassword') }}" method="post">
      @csrf
      <div class="input-group mb-3">
          <input type="email" id="email" name="email" class="form-control" placeholder="email">
          @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
          @endif
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password" name="password" class="form-control" placeholder="Password">
          @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
          @endif
        </div>
        <div class="input-group mb-3">
          <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password">
          @if ($errors->has('confirm_password'))
            <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
          @endif
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="login.html">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

@endsection
@section('customscript')
@endsection