@extends('front.layouts.master')
@section('content')
<section>
    <form action="{{route('demo.Booking')}}" method="post" class="row d-block mx-auto col-lg-12">
        {{ csrf_field() }}
        <div class="row mt-4">
            <div class="col-75">
                <div class="container">
                    <input type="hidden" name="course_id" value="{{$CourseId->id}}">
                    <div class="row">
                        <div class="container-demo mb-4">
                            <h1 class="change-text-color2">{{$CourseId->title}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(!Auth::guard('customer')->check())
            <div class="row">
                <div class="col-75">
                    <div class="container">
                        <div class="row">
                            <div class="container-demo">
                                <h2 class="change-text-color2">User Info</h2>
                            </div>
                            <div class="col-6">
                                <label for="full_name"><i class="fa fa-user"></i> Full Name</label>
                                <input type="text" class="form-control" id="full_name" name="full_name">
                                @if ($errors->has('full_name'))
                                    <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                @endif
                            </div>
                            <div class="col-6">
                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="col-6">
                                <label for="phone"><i class="fa fa-phone"></i> Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
       
        <div class="row mt-4">
            <div class="col-75">
                <div class="container">
                    <div class="row">
                        <div class="container-demo">
                            <h2 class="change-text-color2">Address</h2>
                        </div>
                        <div class="col-6">
                            <label for="country_id"><i class="fa fa-globe"></i> Country</label>
                            <select id="country_id" class="form-control" name="country_id" >
                                <option value="">--Select Country--</option>
                                @foreach($country as $data){
                                <option value="{{$data->id}}">{{ $data->country }}</option>
                                }
                                @endforeach
                            </select>
                            @if ($errors->has('country_id'))
                                <span class="text-danger">{{ $errors->first('country_id') }}</span>
                            @endif
                        </div>
                        <div class="col-6">
                            <label for="timezone_id"><i class="fa fa-clock-o"></i> TimeZone</label>
                            <select id="timezone_id" class="form-control" name="timezone_id" >
                                
                            </select>
                            @if ($errors->has('timezone_id'))
                                <span class="text-danger">{{ $errors->first('timezone_id') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row mt-4">
            <div class="col-75">
                <div class="container">
                    <input type="hidden" name="course_id" value="{{$CourseId->id}}">
                    <div class="row">
                        <div class="container-demo">
                            <h2 class="change-text-color2">Course Info</h2>
                        </div>
                        <div class="col-6">
                            <label for="title"><i class="fa fa-book"></i> Course Name</label>
                            <input type="text" id="title" name="title" value="{{!empty($CourseId->title) ? $CourseId->title : ''}}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="row mt-4">
            <div class="col-75">
                <div class="container">
                    <div class="row">
                        <div class="container-demo">
                            <h2 class="change-text-color2">Booking Info</h2>
                        </div>
                        <div class="col-6">
                            <label for="date_of_demo"><i class="fa fa-calendar"></i> Date Of Demo</label>
                            <input type="date" id="date_of_demo" name="date_of_demo" class="form-control">
                            @if ($errors->has('date_of_demo'))
                                <span class="text-danger">{{ $errors->first('date_of_demo') }}</span>
                            @endif
                        </div>
                        <div class="col-6">
                            <label for="time_of_demo"><i class="fa fa-clock-o"></i> Time Of Damo</label>
                            <input type="time" id="time_of_demo" name="time_of_demo" class="form-control">
                            @if ($errors->has('time_of_demo'))
                                <span class="text-danger">{{ $errors->first('time_of_demo') }}</span>
                            @endif
                        </div>
                    <div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-warning fright mt-4">Book A Demo</button>
    </form>
</section>
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

