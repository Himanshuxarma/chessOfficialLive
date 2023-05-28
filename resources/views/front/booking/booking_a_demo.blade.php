@extends('front.layouts.master')
@section('content')
<?php $countryId = Session::get('SiteCountry'); ?>
<section>
    <div class="container">
        <div class="form-container sc_columns">
            <div class="sc_column_item">
                <div class="sc_contact_form sc_contact_form_contact">
                    <h2 class="title">
                        Book A Demo (Free Demo)
                        @php $priceData = $courseData && $courseData->coursePrice($courseData->id) ? $courseData->coursePrice($courseData->id) : ''; @endphp
                        <span class="alignright course-price">
                            <strong>
                                {{!empty($priceData) && !empty($priceData->currency) ? $priceData->currency : (!empty($countryDetails) && !empty($countryDetails->currency) ? $countryDetails->currency : '')}}
                            </strong>
                            {{$priceData && $priceData->price ? $priceData->price : ($courseData && $courseData->price ? $courseData->price : '') }}
                        </span>
                    </h2>
                    <form action="{{route('demo.Booking')}}" method="post">
                        {{ csrf_field() }}
                        @if(!Auth::guard('customer')->check())
                            <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                <label for="full_name"><i class="fa fa-user"></i> Full Name</label>
                                <input type="text" class="form-control" id="full_name" name="full_name">
                                @if ($errors->has('full_name'))
                                <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                @endif
                            </div>
                            <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                <label for="password"><i class="fa fa-password"></i>Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                <label for="phone"><i class="fa fa-phone"></i> Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                                @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        @endif
                            <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                <label for="country_id"><i class="fa fa-globe"></i> Country</label>
                                <select id="country_id" class="form-control" name="country_id" >
                                    <option value="">--Select Country--</option>
                                    @foreach($country as $data)
                                        <option value="{{$data->id}}" @if($countryId && $countryId == $data->id) selected="selected" @endif >{{ $data->country }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('country_id'))
                                <span class="text-danger">{{ $errors->first('country_id') }}</span>
                                @endif
                            </div>
                            
                            <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                <label for="timezone_id"><i class="fa fa-clock-o"></i> TimeZone</label>
                                <select id="timezone_id" class="form-control" name="timezone_id">
                                    <option value="">--Select Timezone--</option>
                                    @foreach($timezones as $data)
                                        <option value="{{$data->id}}">{{ $data->timezone }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('timezone_id'))
                                <span class="text-danger">{{ $errors->first('timezone_id') }}</span>
                                @endif
                            </div>
                            <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                <label for="course_id"><i class="fa fa-phone"></i> Course</label>
                                <select id="course_id" class="form-control" name="course_id" >
                                    <option value="">--Select Course--</option>
                                    @foreach($course as $data)
                                        <option value="{{$data->id}}" @if($courseData && $courseData->id == $data->id) selected="selected" @endif >{{ $data->title }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('course_id'))
                                <span class="text-danger">{{ $errors->first('course_id') }}</span>
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