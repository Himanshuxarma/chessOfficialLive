@extends('front.layouts.master')
@section('content')
<<<<<<< HEAD
<!-- contact page start -->
<section class="contact-details">
    <div class="form-left">
    <h3>Contact Form</h3>

    <div class="container">
        <div class="columnsWrap sc_columns sc_columns_count_3 margin_top_middle margin_bottom_middle">
            <div class=" sc_column_item sc_column_item_1 odd first span_2">
                <div class="sc_contact_form sc_contact_form_contact contact_form_1">
                    <h2 class="title">Address</h2>
                    <form class="contact_1" method="post" action="include/contact-form.php">
                        
                    <div class="row mt-4">
                             <div class="col-75">
                        <div class="columnsWrap">
                            
                            <div class="columns1_3">
                                <label class="required" for="contact_form_username">Country</label>
                                <input type="text" name="name" id="contact_form_username">
                            </div>
                            <div class="columns1_3">
                                <label class="required" for="contact_form_username">TimeZone</label>
                                <input type="text" name="name" id="contact_form_username">
                            </div>
                           
                        </div>
                        </div>
                        </div>

                        <div class="result sc_infobox"></div>
                    </form>
                </div>
                <div class="sc_contact_form sc_contact_form_contact contact_form_1">
                    <h2 class="title">Booking Info</h2>
                    <form class="contact_1" method="post" action="include/contact-form.php">
                        
                    <div class="row mt-4">
                             <div class="col-75">
                        <div class="columnsWrap">
                            
                            <div class="columns1_3">
                                <label class="required" for="contact_form_username">Date Of Demo</label>
                                <input type="text" name="name" id="contact_form_username">
                            </div>
                            <div class="columns1_3">
                                <label class="required" for="contact_form_username">Time Of Damo</label>
                                <input type="text" name="name" id="contact_form_username">
                            </div>
                           
                        </div>
                        </div>
                        </div>

                        <div class="sc_contact_form_button">
                            <div class="squareButton sc_button_size sc_button_style_global global ico">
                                <button type="submit" name="contact_submit"
                                    class="contact_form_submit icon-comment-1">Send Message</button>
                            </div>
                        </div>

                        <div class="result sc_infobox"></div>
                    </form>
                </div>
            </div>

=======
<section>
    <div class="container">
        <div class="form-container sc_columns">
            <div class="sc_column_item">
                <div class="sc_contact_form sc_contact_form_contact">
                    <h2 class="title">
                        Book A Demo
                        <span class="alignright course-price">$1200</span>
                    </h2>
                    <form action="{{route('demo.Booking')}}" method="post">
                        {{ csrf_field() }}
                        @if(!Auth::guard('customer')->check())
                            <div class="columns1_3 margin_top_mini margin_bottom_mini">
                                <label for="full_name"><i class="fa fa-user"></i> Full Name</label>
                                <input type="text" class="form-control" id="full_name" name="full_name">
                                @if ($errors->has('full_name'))
                                <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                @endif
                            </div>
                            <div class="columns1_3 margin_top_mini margin_bottom_mini">
                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="columns1_3 margin_top_mini margin_bottom_mini">
                                <label for="phone"><i class="fa fa-phone"></i> Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                                @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        @endif
                            <div class="columns1_3 margin_top_mini margin_bottom_mini">
                                <label for="country_id"><i class="fa fa-globe"></i> Country</label>
                                <select id="country_id" class="form-control" name="country_id" >
                                    <option value="">--Select Country--</option>
                                    @foreach($country as $data)
                                        <option value="{{$data->id}}">{{ $data->country }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('country_id'))
                                <span class="text-danger">{{ $errors->first('country_id') }}</span>
                                @endif
                            </div>
                            
                            <div class="columns1_3 margin_top_mini margin_bottom_mini">
                                <label for="timezone_id"><i class="fa fa-clock-o"></i> TimeZone</label>
                                <select id="timezone_id" class="form-control" name="timezone_id" >
                                </select>
                                @if ($errors->has('timezone_id'))
                                <span class="text-danger">{{ $errors->first('timezone_id') }}</span>
                                @endif
                            </div>
                            <div class="columns1_3 margin_top_mini margin_bottom_mini">
                                <label for="phone"><i class="fa fa-phone"></i> Country</label>
                                <select id="country_id" class="form-control" name="country_id" >
                                    <option value="">--Select Country--</option>
                                    @foreach($country as $data)
                                        <option value="{{$data->id}}">{{ $data->country }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('country_id'))
                                <span class="text-danger">{{ $errors->first('country_id') }}</span>
                                @endif
                            </div>
                            <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                <label for="date_of_demo"><i class="fa fa-calendar"></i> Date Of Demo</label>
                                <input type="date" id="date_of_demo" name="date_of_demo" class="form-control">
                                @if ($errors->has('date_of_demo'))
                                <span class="text-danger">{{ $errors->first('date_of_demo') }}</span>
                                @endif
                            </div>
                            <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                <label for="time_of_demo"><i class="fa fa-clock-o"></i> Time Of Damo</label>
                                <input type="time" id="time_of_demo" name="time_of_demo" class="form-control">
                                @if ($errors->has('time_of_demo'))
                                <span class="text-danger">{{ $errors->first('time_of_demo') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="sc_button sc_button_style_light sc_button_size_huge alignright squareButton light huge">
                            <button type="submit" class="btn btn-warning fright mt-4">Book A Demo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
>>>>>>> bdde0f8c261087d09b226084beaabc8c95102010
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