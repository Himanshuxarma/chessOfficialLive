@extends('front.layouts.master')
@section('content')
<!-- contact page start -->
<section class="contact-details">
    <div class="form-left">
      <div class="form-heading"><h3>LOGIN if already having an account</h3></div>
      <form action="{{route('postLogin')}}" method="post" autocomplete="off">
        {{ csrf_field() }}
        <div class="sc_contact_form sc_contact_form_contact">
          <div class="columns1 margin_top_mini margin_bottom_mini">
            <label for="email">Email</label>
            <input type="text" id="email" class="form-control" name="email" placeholder="Enter your email">
            @if ($errors->has('email'))
              <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
          </div>
          <div class="columns1 margin_top_mini margin_bottom_mini">
            <label for="password">Password</label>
            <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password">
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
      <form action="{{route('front.register')}}" method="post" autocomplete="off">
        {{ csrf_field() }}
        <div class="sc_contact_form sc_contact_form_contact">
          <div class="columns1 margin_top_mini margin_bottom_mini">
            <label for="signup_full_name">Full Name</label>
            <input type="text" id="signup_full_name" class="form-control" name="full_name" placeholder="Enter your full name">
          </div>
          <div class="columns1 margin_top_mini margin_bottom_mini">
            <label for="signup_email">Email</label>
            <input type="text" id="signup_email" class="form-control" name="email" placeholder="Enter your email">
          </div>
          <div class="columns1 margin_top_mini margin_bottom_mini">
            <label for="signup_password">Password</label>
            <input type="password" id="signup_password" class="form-control" name="password" placeholder="Enter your password">
          </div>
          <div class="columns1 margin_top_mini margin_bottom_mini">
            <label for="signup_phone">Phone</label>
            <input type="text" id="signup_phone" class="form-control" name="phone" placeholder="Enter your phone number">
          </div>
        </div>
        <div class="registration-button squareButton light huge">
            <button type="submit" class="mt-4">Registration</button>
        </div>
      </form>
    </div>
</section>
@endsection
<!-- contact page end -->
@section('customscript')
<script>
  $(document).ready(function () {
    $('#country_id').on('change', function () {
      var countryId = this.value;
      $('#timezone_id').html('');
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: ajaxUrl+'/fetch_timezone',
        type: 'post',
        data: {'country_id':countryId},
        success: function (res) {
          if(res.status){
            $('#timezone_id').html('<option value="">Select TimeZone</option>');
            $.each(res.data, function (key, value) {
              $('#timezone_id').append('<option value="' + key + '">' + value + '</option>');
            });
          }
        }
      });
    });
  });
</script>
@endsection