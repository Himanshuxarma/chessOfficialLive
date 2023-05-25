@extends('front.layouts.master')
@section('content')
<section>
    <form action="{{route('Store.Buy.Course')}}" method="post" class="row d-block mx-auto col-lg-12">
        {{ csrf_field() }}
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
                            </div>
                            <div class="col-6">
                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="col-6">
                                <label for="phone"><i class="fa fa-phone"></i> Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone">
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
                                    @foreach($country as $data)
                                    <option value="{{$data->id}}">{{ $data->country }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="col-6">
                            <label for="timezone_id"><i class="fa fa-clock-o"></i> TimeZone</label>
                            <select id="timezone_id" class="form-control" name="timezone_id" >
                                
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-75">
                <div class="container">
                    <input type="hidden" name="course_id" value="{{$CourseId->id}}">
                    <div class="row">
                        <div class="container-demo">
                            <h2 class="change-text-color2">Course Info</h2>
                        </div>
                        <div class="col-6">
                            <label for="title"><i class="fa fa-book"></i> Course Name</label>
                            <input type="text" id="title" name="title" value="{{$CourseId->title}}" readonly>
                        </div>
                        <div class="col-6">
                            <label for="title"><i class="fa fa-book"></i> Course Type</label>
                            <input type="text" id="course_type" name="course_type" value="{{$CourseId->type}}" readonly>
                        </div>
                        <div class="col-6">
                            <label for="title"><i class="fa fa-inr"></i> Price</label>
                            <input type="text" id="price" name="price" value="{{$CourseId->price}}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
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
                        </div>
                        <div class="col-6">
                            <label for="time_of_demo"><i class="fa fa-clock-o"></i> Time Of Damo</label>
                            <input type="time" id="time_of_demo" name="time_of_demo" class="form-control">
                        </div>
                    <div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-75">
                <div class="container">
                    <div class="row">
                        <div class="container-demo">
                            <h2 class="change-text-color2">Payment</h2>
                        </div>
                        <label for="fname">Accepted Cards</label>
                        <div class="icon-container ml-3">
                        <i class="fa fa-cc-visa" style="color:navy;"></i>
                        <i class="fa fa-cc-amex" style="color:blue;"></i>
                        <i class="fa fa-cc-mastercard" style="color:red;"></i>
                        <i class="fa fa-cc-paypal" style="color:blue;"></i>
                        </div>
                        <div class="col-6">
                            <label for="name"><i class="fa fa-credit-card"></i> Name on Card</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="card_number"><i class="fa fa-credit-card"></i> Credit card number</label>
                            <input type="text" id="card_number" name="card_number" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="exp_month"><i class="fa fa-calendar"></i> Exp Month</label>
                            <select id="exp_month" name="exp_month"class="form-control">
                                <option>MM</option>
                                <option value="1">01</option>
                                <option value="2">02</option>
                                <option value="3">03</option>
                                <option value="4">04</option>
                                <option value="5">05</option>
                                <option value="6">06</option>
                                <option value="7">07</option>
                                <option value="8">08</option>
                                <option value="9">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="exp_year"><i class="fa fa-calendar"></i> Exp Year</label>
                            <select id="exp_year"name="exp_year"class="form-control">
                                <option>YYYY</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                            </select>
                        </div>
                        
                        <div class="col-6 mt-3">
                            <label for="cvv"><img src="{{asset('assets/front/img/credit-card.png')}}" alt=""width="22px"> CVV</label>
                            <input type="text" id="cvv" name="cvv" class="form-control">
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
