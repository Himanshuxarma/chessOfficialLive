@extends('front.layouts.master')
@section('content')
<section>
    <div class="container">
        <?php 
            $errorMessage = Session::get('error');
            $successMessage = Session::get('success');
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
        <div class="form-container sc_columns p-0">
            <div class="main">
            <div class="sc_column_item">
                <div class="user-dashboard sc_contact_form sc_contact_form_contact">
                    <h2 class="title">
                        Send us your concerns !
                    </h2>
                    <form class="contact_1" method="post" action="{{route('contactsSave')}}">
                        @csrf
                        <div class="columnsWrap">
                            <div class="columns1_2">
                                <label class="required" for="full_name">Name</label>
                                <input type="text" name="full_name" id="full_name" value="{{old('full_name')}}">
                                @if ($errors->has('full_name'))
                                    <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                @endif
                            </div>
                            <div class="columns1_2">
                                <label class="required" for="email">E-mail</label>
                                <input type="text" name="email" id="email" value="{{old('email')}}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="columnsWrap">
                            <div class="columns1_2">
                                <label class="required" for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" value="{{old('phone')}}">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="columns1_2">
                                <label class="required" for="subject">Subject</label>
                                <input type="text" name="subject" id="subject" value="{{old('subject')}}">
                                @if ($errors->has('subject'))
                                    <span class="text-danger">{{ $errors->first('subject') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="message">
                            <div class="">
                                <label class="required" for="message">Your Message</label>
                                <textarea id="message" class="textAreaSize" name="message">{{old('message')}}</textarea>
                                @if ($errors->has('message'))
                                    <span class="text-danger">{{ $errors->first('message') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="message">
                            <div class="">
                                <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="sc_contact_form_button">
                            <div class="squareButton sc_button_size sc_button_style_global global ico">
                                <button type="submit" class="contact_form_submit icon-comment-1">Send</button>
                            </div>
                        </div>

                        <div class="result sc_infobox"></div>
                    </form>
                    </div>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('customscript')
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
