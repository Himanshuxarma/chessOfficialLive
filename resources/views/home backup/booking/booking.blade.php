@extends('front.layouts.master')
@section('content')

@if(Auth::guard('customer')->check())

    <section>
        <div class="row">
            <div class="col-75">
                <div class="container">
                    <form action="{{$CourseId->id}}" method="post" class="row d-block mx-auto col-lg-12">
                        {{ csrf_field() }}
                        <input type="hidden" name="course_id" value="{{$CourseId->id}}">
                        <div class="row">
                            <div class="container-demo">
                                <h2 class="change-text-color2">Course Info</h2>
                            </div>
                            <div class="col-12 mt-4">


                                <div class="row">
                                    <div class="col-6">
                                        <label for="title"><i class="fa fa-book"></i> Course Name</label>
                                        <input type="text" id="title" name="title" value="{{$CourseId->title}}" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label for="type"><i class="fa fa-book"></i> Course Type</label>
                                        <input type="text" id="type" name="type" value="{{$CourseId->type}}" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="price"><i class="fa fa-inr"></i> Course Price</label>
                                        <input type="text" id="price" name="price" value="{{$CourseId->price}}" readonly>
                                    </div>

                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="row">
            <div class="col-75">
                <div class="container">
                    <form action="" method="post" class="row d-block mx-auto col-lg-12">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="container-demo">
                                <h2 class="change-text-color2">Address</h2>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="country_id"><i class="fa fa-globe"></i> Country</label>
                                        <select class="form-control" name="country_id" id="country_id">
                                            <option value="">--Select Country--</option>
                                            @foreach($country as $data){
                                            <option value="{{$data->id}}">{{ $data->country }}</option>
                                            }
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="timezone_id"><i class="fa fa-clock-o"></i> TimeZone</label>
                                        <select class="form-control" name="timezone_id" id="timezone_id">
                                            <option value="">--Select TimeZone--</option>
                                            @foreach($timezone as $times){
                                            <option value="{{$times->id}}">{{ $times->timezone }}</option>
                                            }
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="email"><i class="fa fa-map-marker"></i> Address</label>
                                        <input type="text" id="email" name="email">
                                    </div>

                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="row">
            <div class="col-75">
                <div class="container">
                    <form action="" method="post" class="row d-block mx-auto col-lg-12">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="container-demo">
                                <h2 class="change-text-color2">Booking Info</h2>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="fname"><i class="fa fa-calendar"></i> Date Of Demo</label>
                                        <input type="date" id="fname" name="firstname" class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label for="fname"><i class="fa fa-clock-o"></i> Time Of Damo</label>
                                        <input type="time" id="fname" name="firstname" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-warning fright mt-4">Book A Demo</button>
                                <div>

                    </form>
                </div>
            </div>
        </div>
    </section>

@else

<section>
    <div class="row">
        <div class="col-75">
            <div class="container">
                <form action="{{route('register.post')}}" method="post" class="row d-block mx-auto col-lg-12">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="container-demo">
                            <h2 class="change-text-color2">User Info</h2>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <label for="full_name"><i class="fa fa-user"></i> Full Name</label>
                                    <input type="text" id="full_name" name="full_name">
                                </div>
                                <div class="col-6">
                                    <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                    <input type="text" id="email" name="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="phone"><i class="fa fa-phone"></i> Phone</label>
                                    <input type="text" id="phone" name="phone">
                                </div>
                            </div>
                        </div>
                        
                </form>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="row">
        <div class="col-75">
            <div class="container">
                <form action="{{$CourseId->id}}" method="post" class="row d-block mx-auto col-lg-12">
                    {{ csrf_field() }}
                    <input type="hidden" name="course_id" value="{{$CourseId->id}}">
                    <div class="row">
                        <div class="container-demo">
                            <h2 class="change-text-color2">Course Info</h2>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <label for="title"><i class="fa fa-book"></i> Course Name</label>
                                    <input type="text" id="title" name="title" value="{{$CourseId->title}}" readonly>
                                </div>
                                <div class="col-6">
                                    <label for="type"><i class="fa fa-book"></i> Course Type</label>
                                    <input type="text" id="type" name="type" value="{{$CourseId->type}}" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="price"><i class="fa fa-inr"></i> Course Price</label>
                                    <input type="text" id="price" name="price" value="{{$CourseId->price}}" readonly>
                                </div>

                            </div>
                        </div>

                </form>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="row">
        <div class="col-75">
            <div class="container">
                <form action="" method="post" class="row d-block mx-auto col-lg-12">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="container-demo">
                            <h2 class="change-text-color2">Address</h2>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <label for="country_id"><i class="fa fa-globe"></i> Country</label>
                                    <select class="form-control" name="country_id" id="country_id">
                                        <option value="">--Select Country--</option>
                                        @foreach($country as $data){
                                        <option value="{{$data->id}}">{{ $data->country }}</option>
                                        }
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="timezone_id"><i class="fa fa-clock-o"></i> TimeZone</label>
                                    <select class="form-control" name="timezone_id" id="timezone_id">
                                        <option value="">--Select TimeZone--</option>
                                        @foreach($timezone as $times){
                                        <option value="{{$times->id}}">{{ $times->timezone }}</option>
                                        }
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="address"><i class="fa fa-map-marker"></i> Address</label>
                                    <input type="text" id="address" name="address">
                                </div>

                            </div>
                        </div>

                </form>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="row">
        <div class="col-75">
            <div class="container">
                <form class="row d-block mx-auto col-lg-12">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="container-demo">
                            <h2 class="change-text-color2">Booking Info</h2>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <label for="date_of_demo"><i class="fa fa-calendar"></i> Date Of Demo</label>
                                    <input type="date" id="date_of_demo" name="date_of_demo" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="time_of_demo"><i class="fa fa-clock-o"></i> Time Of Damo</label>
                                    <input type="time" id="time_of_demo" name="time_of_demo" value="09:12" min="09:00" max="12:00" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-warning fright mt-4">Book A Demo</button>
                            <div>

                </form>
            </div>
        </div>
    </div>
</section>
@endif


@endsection
