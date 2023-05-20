<!DOCTYPE html>
<html lang="en">
 <!-- ======= Head ======= -->
 @include('front.layouts.head')

<body>

  <!-- ======= Header ======= -->
  @include('front.layouts.header')
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <?php
    if(Request::is('/')) {
      
    ?>
@include('front.layouts.banner')
<?php
    }
    ?>
  <!-- End Hero -->

  <main id="main">
  @yield('content')
    
  </main>
  <!-- End #main -->
  
  <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
          <button type="button" class="close close_login" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php 
          if(isset($loginError) && !empty($loginError)){ 
        ?>
            <p class="alert alert-danger hide">
              {{ $loginError }}
            </p>
        <?php 
          }
        ?>
        <form action="{{url('postLogin')}}" method="post" id="loginForm">
          {{ csrf_field() }}
          <div class="modal-body mx-3">
            <div class="md-form">
              <i class="fas fa-envelope prefix grey-text"></i>
              <input type="email" name="email" id="loginEmail" class="form-control validate" placeholder="Your email">
              <span id="loginEmailError" class="validation_error"></span>
            </div>

            <div class="md-form">
              <i class="fas fa-lock prefix grey-text"></i>
              <input type="password" name="password" id="loginPassword" class="form-control validate" placeholder="Your password">
              <span id="loginPasswordError" class="validation_error"></span>
            </div>

          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button type="button" id="submitLoginDetails" class="btn buy-btn btn-submit">Login</button>
          </div>
        </form>
        <div class="d-flex justify-content-between">
        <a href="javascript:void(0);" class="have_no_account ml-4" data-toggle="modal" data-target="#modalRegisterForm">Sign up</a>
        <a href="javascript:void(0);" class="have_forgot_password mr-4" data-toggle="modal" data-target="#modalForgotpasswordForm">Forget Password !</a>
        </div>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="modalForgotpasswordForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold">Forgot Password</h4>
          <button type="button" class="close close_forgot" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php 
          if(isset($forgotPsasswordError)){ 
        ?>
            <p class="alert alert-danger hide">
              {{ $forgotPsasswordError }}
            </p>
        <?php 
          }
        ?>
        <form action="{{url('postForgotPassword')}}" method="post" id="forgotPasswordForm">
          {{ csrf_field() }}
          <div class="modal-body mx-3">
            <div class="md-form">
              <i class="fas fa-envelope prefix grey-text"></i>
              <input type="email" name="email" id="forgotPaswordEmail" class="form-control validate" placeholder="Your email">
              <span id="forgotPasswordEmailError" class="validation_error"></span>
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button type="button" id="submitForgotPassword" class="btn buy-btn btn-submit">Submit</button>
          </div>
        </form>
        <a href="javascript:void(0);" class="do_login" id="openLoginBack" data-toggle="modal" data-target="#modalLoginForm">Login</a>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
          <button type="button" class="close close_register" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('register.post')}}"method="post">
          {{ csrf_field() }}
          <div class="modal-body mx-3">
            <div class="md-form">
              <i class="fas fa-user prefix grey-text"></i>
              <input type="text" name="full_name"  class="form-control validate" placeholder="Your Full Name">
              
            </div>
            <div class="md-form">
              <i class="fas fa-phone prefix grey-text"></i>
              <input type="text" name="phone"  class="form-control validate" minlength="10" maxlength="10" onkeypress="return isNumberKey(event)" placeholder="Your Phone">
              
            </div>
            <div class="md-form">
              <i class="fas fa-envelope prefix grey-text"></i>
              <input type="email" name="email" id="defaultForm-email" class="form-control validate" placeholder="Your Email">
              
            </div>

            <div class="md-form">
              <i class="fas fa-lock prefix grey-text"></i>
              <input type="password"name="password" id="defaultForm-pass" class="form-control validate" placeholder="Your password">
              
            </div>

          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button type="submit" class="btn buy-btn">Sign Up</button>
          </div>
        </form>
        <a href="javascript:void(0);" class="have_account" data-toggle="modal" data-target="#modalLoginForm">Already have an account!</a>
      </div>
    </div>
  </div>


  


  <!-- ======= Footer ======= -->
  @include('front.layouts.footer')
  <!-- End Footer -->

  @include('front.layouts.foot')
  <?php
    if(isset($loginError) && !empty($loginError)){
  ?>
  <script>
    function w(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    jQuery('#modalLoginForm').modal('show');
  </script>
  <?php
    }
  ?>
  <script>
    
    $(document).on('click', '#submitLoginDetails', function(event){
      event.preventDefault();
      let allSet = true;
      if(jQuery('#loginEmail').val() == ''){
        allSet = false;
        jQuery('#loginEmailError').html('Please enter a valid email address');
      } else {
        allSet = true;
        jQuery('#loginEmailError').html('');
      }
      if(jQuery('#loginPassword').val() == ''){
        allSet = false;
        jQuery('#loginPasswordError').html('Please enter your password');
      } else {
        allSet = true;
        jQuery('#loginPasswordError').html('');
      }
      if(allSet){
        jQuery('#loginForm').submit();
      } else {
        return false;
      }
    });

    $(document).on('click', '#submitForgotPassword', function(event){
      event.preventDefault();
      let allSet = true;
      if(jQuery('#forgotPasswordEmail').val() == ''){
        allSet = false;
        jQuery('#forgotPasswordEmailError').html('Please enter a valid email address');
      } else {
        allSet = true;
        jQuery('#forgotPasswordEmailError').html('');
      }
      if(allSet){
        jQuery('#forgotPasswordForm').submit();
      } else {
        return false;
      }
    });
 

    jQuery(document).on('click', '.change_country', function(){
      let countryId = jQuery(this).data('country-id');
      if(countryId != ""){
        jQuery.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:'get',
          url: ajaxUrl+'/setCountry',
          data: {'country_id': countryId},
          success: function(response){
              // var response = $.parseJSON(response);
              let countryData = response.data;
              if(response.status){
                jQuery('#selectedCountry').data('country-id', countryData.id);
                let imgUrl = "/uploads/country/";
                let newHtml = '<span><img width="24px" src="'+imgUrl+'/'+countryData.country_flag+'"> '+countryData.country_code+'</span>';
                jQuery('#selectedCountry').html(newHtml);
              }
              location.reload();
              // jQuery('.countryList').hide();
          }, 
          error: function(error){
          }
        });
      }
    });

  </script>

</body>

</html>