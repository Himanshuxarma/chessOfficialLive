@extends('front.layouts.master')
@section('content')
<!-- <section>
    <div class="container">
        <div class="form-container sc_columns">
            <div class="sc_column_item">
                <div class="sc_contact_form sc_contact_form_contact">
                    <h2 class="title">
                        Login
                        
                    </h2>
                    <form action="{{route('demo.Booking')}}" method="post">
                        {{ csrf_field() }}
                            <div class="columns1_3 margin_top_mini margin_bottom_mini">
                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="columns1_3 margin_top_mini margin_bottom_mini">
                                <label for="password"><i class="fa fa-phone"></i> Password</label>
                                <input type="text" class="form-control" id="password" name="password">
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            
                        </div>
                        <div class="sc_button sc_button_style_light sc_button_size_huge alignright squareButton light huge">
                            <button type="submit" class="btn btn-warning fright mt-4">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> -->

<div class="login-forms-1">
    
        <div class="form-login-1">
        <h3>Contact Form</h3>

<div class="container">
  <form action="/action_page.php">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>

            

        </div>
        <div class="form-register-1">
            
        </div>
    


</div>


@endsection