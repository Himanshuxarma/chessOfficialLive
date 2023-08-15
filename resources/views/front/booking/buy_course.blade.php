@extends('front.layouts.master')
@section('content')
<?php
$countryId = 6;
if(session()->has('SiteCountry')){
    $countryId = session()->get('SiteCountry');
}
$countryDetails = App\Helpers\Helper::getCountryData($countryId); 
$offers = \Helper::getoffersbycourse($courseData->id);
?>
<section>
    <div class="container">
        <div class="form-container sc_columns">
            <div class="sc_column_item">
                <div class="sc_contact_form sc_contact_form_contact">
                    <h2 class="title">
                        Buy A Course
                        @php $priceData = $courseData ? $courseData->coursePrice($courseData->id) : []; @endphp
                        @if($courseData)
                        <span class="alignright course-price">
                            <strong>
                                {{!empty($priceData) && !empty($priceData->currency) ? $priceData->currency : (!empty($countryDetails) && !empty($countryDetails->currency) ? $countryDetails->currency : '₹')}}
                            </strong>
                            @if(!empty($offers) && !empty($offers->offer_id))
                                <?php 
                                    $priceDefault = !empty($priceData) && !empty($priceData->first_price) ? $priceData->first_price : (!empty($courseData) && !empty($courseData->price) ? $courseData->price : 0);
                                    $offerPercentage = $offers->amount ? $offers->amount : 0;
                                    if($priceDefault > $offerPercentage){
                                        $newPrice = $priceDefault - ($priceDefault * ($offerPercentage/100));
                                    } else {
                                        $newPrice = $priceDefault;
                                    }
                                ?>
                                <input type="hidden" name="admin_offer" id="adminOffer" value="{{$offerPercentage}}"> 
                                <input type="hidden" name="base_price" value="{{!empty($priceData) && !empty($priceData->first_price) ? $priceData->first_price : (!empty($courseData) && !empty($courseData->price) ? $courseData->price : 0)}}">
                                <input type="hidden" name="new_price" value="{{!empty($newPrice) && !empty($newPrice) ? $newPrice : 0}}">
                                <s id="basePrice">{{!empty($priceData) && !empty($priceData->first_price) ? $priceData->first_price : (!empty($courseData) && !empty($courseData->price) ? $courseData->price.'/-' : 0)}}</s>/-
                                <strong id="newPrice">{{!empty($newPrice) && !empty($newPrice) ? $newPrice : 0}}</strong>/-
                            @else
                                <input type="hidden" name="base_price" value="{{!empty($priceData) && !empty($priceData->first_price) ? $priceData->first_price.'/-' : (!empty($courseData) && !empty($courseData->price) ? $courseData->price : 0)}}"> 
                                <s id="basePrice" class="hide">{{!empty($priceData) && !empty($priceData->first_price) ? $priceData->first_price : (!empty($courseData) && !empty($courseData->price) ? $courseData->price.'/-' : 0)}}</s>/-
                                <strong id="newPrice">{{!empty($priceData) && !empty($priceData->first_price) ? $priceData->first_price : (!empty($courseData) && !empty($courseData->price) ? $courseData->price : 0)}}</strong>/-
                            @endif
                            <?php 
                                if(!empty($referee_customer) || !empty($referral_customer)){
                            ?>
                                <input type="hidden" id="reference_offer" value="10" data-user-type="<?php echo $referee_customer ? 'referee' : 'referral'; ?>" />
                            <?php
                                }
                            ?>
                        </span>
                        @endif
                    </h2>
                    <p class="alert alert-offer hide refferal_alert"></p>
                    <form action="{{route('Store.Buy.Course')}}" id="booking_frm" method="post">
                        @if(!empty($referral_customer))
                            <input type="hidden" name="referral_offer" id="reference_offer" value="{{!empty($referral_customer->referrer_offer_percentage) ? $referral_customer->referrer_offer_percentage : 0}}">
                        @endif
                        @if(!empty($referee_customer))
                            <input type="hidden" name="referral_offer" id="reference_offer" value="{{!empty($referee_customer->referee_offer_percentage) ? $referee_customer->referee_offer_percentage : 0}}">
                        @endif
                        @if(!empty($offers) && !empty($offers->offer_id))
                            <input type="hidden" name="admin_offer" id="adminOffer" value="{{$offerPercentage}}"> 
                        @endif
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
                            </br></br>
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
                            <select id="timezone_id" class="form-control" name="timezone_id" >
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
                            <label for="phone"><i class="fa fa-phone"></i> Course</label>
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
                        <input type="hidden" name="course_price_currency" value="{{!empty($priceData) && !empty($priceData->currency) ? $priceData->currency : (!empty($countryDetails) && !empty($countryDetails->currency) ? $countryDetails->currency : '₹')}}">
                        <input type="hidden" name="course_price" value="{{!empty($priceData) && !empty($priceData->price) ? $priceData->price : (!empty($courseData->price) ? $courseData->price : 0.00) }}">
                        <input type="hidden" name="course_type" value="{{!empty($courseData) && !empty($courseData->type) ? $courseData->type : ''}}">
                        <input type="hidden" name="course_taken" value="">
                        <div class="columns1_2 margin_top_mini margin_bottom_mini">
                            <label for="date_of_demo"><i class="fa fa-calendar"></i>Starting Date</label>
                            <input type="date" id="date_of_demo" name="date_of_demo" class="form-control">
                            @if ($errors->has('date_of_demo'))
                            <span class="text-danger">{{ $errors->first('date_of_demo') }}</span>
                            @endif
                        </div>
                        <div class="columns1_2 margin_top_mini margin_bottom_mini">
                            <label for="time_of_demo"><i class="fa fa-clock-o"></i> Starting Time</label>
                            <input type="time" id="time_of_demo" name="time_of_demo" class="form-control">
                            @if ($errors->has('time_of_demo'))
                            <span class="text-danger">{{ $errors->first('time_of_demo') }}</span>
                            @endif
                        </div>
                        <div class="sc_button sc_button_style_light sc_button_size_huge alignright squareButton light huge">
                            <button type="button" class="btn btn-warning fright mt-4 book_app_cls">Buy A Course</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('customscript')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
$(document).ready(function () {
    // jQuery('#newPrice').html('');
    var courseType = localStorage.getItem("courseType");
    var courseTaken = localStorage.getItem("courseTaken");
    var firstPrice = localStorage.getItem("firstPrice");
    var secondPrice = localStorage.getItem("secondPrice");
    if(courseTaken == null){
        courseTaken = "full_course";
        firstPrice = jQuery("input[name=base_price]").val();
    }
    var referrenceOffer = jQuery('#reference_offer').val();
    if(courseTaken == null || courseTaken == undefined || String(courseTaken) == "full_course"){
        var finalAmount = firstPrice;
    } else {
        var finalAmount = secondPrice;
    }
    // alert(finalAmount);
    var adminOffer = jQuery('#adminOffer').val();
    if(adminOffer != undefined && adminOffer != null){
        jQuery('#basePrice').html(finalAmount);
        var newFinalPrice = parseFloat(finalAmount) - parseFloat(parseFloat(finalAmount) * parseFloat(adminOffer)/100);  
    } else {
        jQuery('#basePrice').html('');
        var newFinalPrice = finalAmount;
    }
    var amountIfReference = 0;
    if(referrenceOffer != "" && referrenceOffer != undefined){
        amountIfReference = parseFloat(newFinalPrice) - parseFloat(parseFloat(newFinalPrice) * parseFloat(referrenceOffer)/100);
        jQuery('#basePrice').html(newFinalPrice.toFixed(2)).removeClass('hide');
        jQuery('#newPrice').html(amountIfReference.toFixed(2));
        jQuery('.refferal_alert').html('Refferal offer applied').css('display', 'block');
    } else {
        jQuery('#newPrice').html(newFinalPrice.toFixed(2));
    }
    jQuery('input[name=course_price]').val(newFinalPrice);
    jQuery('input[name=course_taken').val(courseTaken);

    $('#country_id').on('change', function () {
        var countryId = this.value;
        $('#timezone_id').html('');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: ajaxUrl + '/fetch_timezone',
            type: 'post',
            data: {'country_id': countryId},
            success: function (res) {
                if (res.status) {
                    $('#timezone_id').html('<option value="">Select TimeZone</option>');
                    $.each(res.data, function (key, value) {
                        $('#timezone_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            }
        });
    });

    jQuery(".book_app_cls").on("click", function () {
        var formData = new FormData(jQuery("#booking_frm")[0]);
        jQuery.ajax({
            url: '{{ route("Store.Buy.Course") }}',
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            beforeSend: function () {
                jQuery(".loading-box").show();
            },
            success: function (response) {
                console.log(response);
                jQuery(".fee_error").show();
                jQuery(".fee_error").text("");
                if (response.status == "200") {
                    jQuery(".fee_error").hide();
                    //toastr.success(response.msg);
                    //window.location = response.url;
                    if (response.price != "" && response.course_id != "" && response.order_id != "" && response.user_id != "" && response.currency != "") {
                        paymentRezarPay(response.price, response.course_id, response.order_id, response.user_id);
                    }
                    jQuery(".loading-box").hide();
                } else if (response.status == "401") {
                    var count = 1;
                    jQuery.each(response.errors, function (i, file) {
                        if (count == 1) {
                            jQuery('html,body').animate({scrollTop: jQuery('#' + i).offset().top - 180}, 1000);
                        }
                        count++;
                        jQuery('#' + i).after('<span class="fee_error">' + file + '</span>');
                    });
                    hideErrorMsg();
                    jQuery(".loading-box").hide();
                } else {
                    toastr.success(response.error);
                }
                jQuery(".loading-box").hide();
            },
            error: function (xhr) {
                toastr.error('Error deleting!.Please try again.');
                jQuery(".loading-box").hide();
            },
            complete: function () {
                jQuery(".loading-box").hide();
            }
        });
    });
});

var RAZORPAY_KEY = '{{ env("RAZORPAY_KEY") }}';
function paymentRezarPay(price, courseId, orderId, user_id, currency) {
    var amount = price;
    var total_amount = amount * 100;
    var options = {
        "key": RAZORPAY_KEY, // Enter the Key ID generated from the Dashboard
        "amount": total_amount, // Amount is in currency subunits. Default currency is INR. Hence, 10 refers to 1000 paise
        "currency": currency,
        "name": "chessOfficialLive.com",
        "description": "Booking Payment",
        "image": "{{ asset('/front/assets/images/favicon.png') }}",
        "order_id": "", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
        "handler": function (response) {
            jQuery.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.ajax({
                type: 'POST',
                url: "{{ route('booking.payment.online') }}",
                //data: formData,
                data: {
                    _token: '{{ csrf_token() }}',
                    price: price,
                    courseId: courseId,
                    orderId: orderId,
                    user_id: user_id,
                    currency: currency,
                    razorpay_payment_id: response.razorpay_payment_id
                },
                dataType: "json",
                beforeSend: function () {
                    jQuery(".loading-box").show();
                },
                success: function (response) {
                    console.log(response);
                    localStorage.clear();
                    jQuery(".fee_error").show();
                    jQuery(".fee_error").text("");
                    if (response.status == "200") {
                        jQuery(".fee_error").hide();
                        toastr.success(response.msg);
                        setTimeout(function () {
                            window.location = response.url;
                        }, 2000);
                    } else if (response.status == "501") {
                        jQuery.each(response.errors, function (i, file) {
                            jQuery('#' + i).after('<span class="fee_error">' + file + '</span>');
                        });
                    } else {
                        toastr.error(response.msg);
                    }
                    jQuery(".loading-box").hide();
                },
                error: function (xhr) {
                    toastr.error('Error deleting!.Please try again1.');
                    jQuery(".loading-box").hide();
                },
                complete: function () {
                    jQuery(".loading-box").hide();
                }
            });
        },

        "prefill": {
            "name": "",
            "email": "",
            "contact": ""
        },
        "notes": {
            "address": "test test"
        },
        "theme": {
            "color": "#F37254"
        }
    };
    var rzp1 = new Razorpay(options);
    rzp1.open();
}
</script>
@endsection