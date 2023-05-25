@extends('front.layouts.master')
@section('content')
<!-- contact page start -->
<section class="contact-details">
    <div class="form-left">
    <h3>Contact Form</h3>

<div class="container">
  <form action="/action_page.php">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

   

    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>
    <div class="btns-with-submit">
        <a href="#">Submit</a>
    </div>
  </form>
</div>

    </div>
    <div class="form-right">
        <div class="secound-name">
    <h3></h3>

<div class="container">
  <form action="/action_page.php">
    

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">
    </div>
    
     
  </form>
</div>
</div>

</section>
@endsection
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
