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
            @if (Session::has('message'))
              <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
              </div>
            @endif
            <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
            <form action="{{ route('postAdminForgotPassword') }}" method="post">
                @csrf
                <div class="input-group mb-3">

                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                  
                    <div class="input-group-append">
                        <div class="input-group-text">
                             @if ($errors->has('email'))
                                <span class="fas fa-envelope">{{ $errors->first('email') }}</span>
                              @endif
                        </div>
                    </div>
                  
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                    </div>
                 </div>
            </form>
            <div class="col-4 mt-4"><a href="{{route('adminLogin')}}">
                        <button class="btn btn-primary btn-block">Sign In</button>
                        </a>
                    </div>
        </div>
    </div>
</div>
@endsection
@section('customscript')
@endsection
