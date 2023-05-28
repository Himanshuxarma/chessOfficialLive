@extends('front.layouts.master')
@section('content')
<!-- contact page start -->
<section class="contact-details">
    <div class="form-left">
      <h3>Contact Form</h3>
      <div class="container">
        <form action="/action_page.php">
            <div class="columns1_3 margin_top_mini margin_bottom_mini">
              <label for="fname">Email</label>
              <input type="text" id="email" class="form-control" name="email" placeholder="Enter your email">
            </div>

            <div class="columns1_3 margin_top_mini margin_bottom_mini">
              <label for="fname">Password</label>
              <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password">
            </div>
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
    </div>

</section>
<!-- contact page end -->
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