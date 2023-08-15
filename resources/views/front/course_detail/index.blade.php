@extends('front.layouts.master')
@section('content')
<?php
$countryId = 6;
if(session()->has('SiteCountry')){
    $countryId = session()->get('SiteCountry');
}
$countryDetails = App\Helpers\Helper::getCountryData($countryId); 
?>
@php $offers = \Helper::getoffersbycourse($courses->id); @endphp
<div class="widgetTabs">
    <div id="topOfPage" class="topTabsWrap">
        <div class="main">
            <h3 class="pageTitle h3">{{$courses->title}}</h3>
            @if(!empty($offers) && !empty($offers->amount))
                <div class="pageTitle h3 course-details-offers">OFFER {{$offers->amount}}% OFF</div>
            @endif
        </div>
    </div>
    <div class="mainWrap without_sidebar">
        <div class="main">
            <div class="content">
                
                <aside id="tabBlog" class="blogContent">
                    <article class="post_format_standard postCenter hrShadow odd post">
                        <?php /* <div class="slidecontainer">
                            <input type="range" min="0" max="100" value="100" class="slider" step="50" id="myRange">
                        </div> */ ?>
                        
                        <div class="sc_section post_thumb thumb">
                            <a href="javascript:void(0)">
                                @if(!empty($courses->image))
                                	@php $courseImg = asset('/uploads/course').'/'.$courses->image; @endphp
                                @else
                                	@php $courseImg = '/assets/front/images/default.png'; @endphp
                                @endif
                                <img class="course-details-page" alt="Babysitter and Nanny Hiring Resources" src="{{$courseImg}}">
                            </a>
                        </div>
                        <div class="postStandard">
                            <p style="color:#000"><b>{{ !empty($courses->description) ? strip_tags($courses->description) : ''}} </b></p>
                        </div>
                        <div class="course_detail_button">
                            <ul>
                                <li class="squareButton light ico ">
                                    <a href="javascript:void(0)"> {{$courses->class}} Session</a>
                                </li>
                                <li class="squareButton light ico">
                                    
                                </li>
                                <li class="squareButton light ico">
                                    <a class="icon-year" title="Comments - 1" href="javascript:void(0)">{{$courses->age}} Age</a>
                                </li>
                                <li class="squareButton light ico">
                                    <a class="icon-classroom" title="Comments - 1" href="javascript:void(0)">{{$courses->batch}} Batch</a>
                                </li>
                                <li class="squareButton light ico">
                                    <a class="icon-comment-1" title="Comments - 1" href="javascript:void(0)">{{$courses->hrs_training}} Hrs Training</a>
                                </li>
                                <li class="squareButton light ico">
                                    <a class="icon-comment-1" title="Comments - 1" href="javascript:void(0)">{{$courses->format}} Format</a>
                                </li>
                                <li class="squareButton light ico">
                                    <a class="icon-clock" title="Comments - 1" href="javascript:void(0)">{{$courses->duration}} Duration</a>
                                </li>
							</ul>
                        </div>
                        <div class="booking-section justify-end d-flex  flex-wrap">
                            @php $priceData =  $courses->coursePrice($courses->id); @endphp
                            <h2 class="d-flex p-0 m-0 mb-10 mr-20">
                                <a class="@if(!empty($offers) && !empty($offers->offer_id)) price_with_offer @else icon_money @endif d-flex m-0" href="javascript:void(0)">
                                    <strong>
                                        {{!empty($priceData) && !empty($priceData->currency) ? $priceData->currency : (!empty($countryDetails) && !empty($countryDetails->currency) ? $countryDetails->currency : '₹')}}
                                    </strong>
                                    @if(!empty($offers) && !empty($offers->offer_id))
                                        <?php 
                                            $priceDefault = !empty($priceData) && !empty($priceData->first_price) ? $priceData->first_price : (!empty($data) && !empty($data->price) ? $data->price : 0);
                                            $offerPercentage = $offers->amount ? $offers->amount : 0;
                                            if($priceDefault > $offerPercentage){
                                                $newPrice = $priceDefault - ($priceDefault * ($offerPercentage/100));
                                            } else {
                                                $newPrice = $priceDefault;
                                            }
                                        ?>
                                        <input type="hidden" name="admin_offer" id="adminOffer" value="{{$offerPercentage}}">

                                        <input type="hidden" name="base_price" value="{{!empty($priceData) && !empty($priceData->first_price) ? $priceData->first_price.'/-' : (!empty($data) && !empty($data->price) ? $data->price.'/-' : 0)}}">
                                        <input type="hidden" name="new_price" value="{{!empty($newPrice) && !empty($newPrice) ? $newPrice.'/-' : 0}}">
                                        <s id="basePrice">{{!empty($priceData) && !empty($priceData->first_price) ? $priceData->first_price.'/-' : (!empty($data) && !empty($data->price) ? $data->price.'/-' : 0)}}</s>
                                        <strong id="newPrice">{{!empty($newPrice) && !empty($newPrice) ? $newPrice.'/-' : 0}}</strong>
                                    @else
                                        <input type="hidden" name="base_price" value="{{!empty($priceData) && !empty($priceData->first_price) ? $priceData->first_price.'/-' : (!empty($data) && !empty($data->price) ? $data->price.'/-' : 0)}}"> 
                                        <strong id="basePrice">{{!empty($priceData) && !empty($priceData->first_price) ? $priceData->first_price.'/-' : (!empty($data) && !empty($data->price) ? $data->price.'/-' : 0)}}</strong>
                                        <strong id="newPrice"></strong>
                                    @endif
                                    <input type="hidden" name="first_price" value="{{isset($priceData->first_price) && !empty($priceData->first_price) ? $priceData->first_price : 0}}">
                                    <input type="hidden" name="second_price" value="{{isset($priceData->second_price) && !empty($priceData->second_price) ? $priceData->second_price : 0}}">
                                </a>
                            </h2>
                            <div class="typecourse  mb-10 mr-30 squareButton">
                                @if($courses->type == "main_course")
                                    <select class="typecourse1" name="course_type" id="course_type" data-course-type="{{$courses->type ? $courses->type : 'main_course'}}">
                                        <option>Select Course Type</option>
                                        <option value="full_course"> Full Course</option>
                                        <option value="half_course"> Half Course</option>
                                    </select>
                                @else 
                                    <select class="typecourse1" name="course_type" id="course_type" data-course-type="{{$courses->type ? $courses->type : 'main_course'}}">
                                        <option>Select Course Type</option>
                                        <option value="full_course">1 Month</option>
                                        <option value="half_course">3 Month</option>
                                    </select>
                                @endif
                            </div>
                            <div class="booking_demo  mb-10">
                                <div class="booking-demo-1">
                                    <ul class="for-mobile">
                                        <li class="squareButton light ico">
                                            <a href="{{url('booking/'. $courses->id)}}">Book A Demo</a>
                                        </li>
                                        <li class="squareButton light ico ml-20">
                                            <a href="{{route('Buy.Course',$courses->id)}}" id="buyACourseLink">Buy A Course</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </article>

                    @if (!empty($curriculum))
                    @foreach($curriculum as $key=> $data)

                    <article class="post-article post_format_standard d-flex flex-wrap hrShadow post @if($key % 2 == 0) even @endif odd">

                        <div class="columns1_2 p-30 m-0">
                            <h2 class="post_title">
                                <a href="javascript:void(0)">{{$data->title}}</a>
                            </h2>
                            <div class="postStandard">
                                <p>{{$data->description}}</p>
                            </div>
                        </div>
                        <div class="columns1_2  @if($key % 2 == 0)sc_alignright  @endif sc_alignleft m-0"> 
                            
                                <div class="course_curriculum">
								@if(!empty($data->image))
                                	@php $curriculumImg = asset('/uploads/course_curriculum').'/'.$data->image; @endphp
                                @else
                                	@php $curriculumImg = '/assets/front/images/sketch-4029522.jpg'; @endphp
                                @endif
                                    <img src="{{$curriculumImg}}" data-zoom-image="images/900x600.png" alt="" />
                                </div>
                            
                        </div>
                    </article>
                    @endforeach
                    @else
                    <h3> Course Curriculum Data Not Found</h3>
                    @endif
                </aside>
            </div>
        </div>
    </div>
</div>
@endsection
@section('customscript')
<script>
    var courseTaken, courseType, firstPrice, secondPrice;
    jQuery(document).on('change', '#course_type', function(){
        courseTaken = jQuery(this).val();
        courseType = jQuery(this).data('course-type');
        firstPrice = jQuery('input[name=first_price]').val();
        secondPrice = jQuery('input[name=second_price]').val();
        // let courseTakenVariable = "";
        // if(courseType=="main_course"){
        //     courseTakenHalf = "half_course";
        //     courseTakenFull = "full_course";
        // } else {
        //     courseTakenHalf = "";
        //     courseTakenFull = "full_course";
        // }
        if(courseTaken == "half_course"){
            var finalPrice = jQuery('input[name=second_price]').val();
            //newLink =  jQuery('#buyACourseLink').attr('href')+'?courseType='+courseTaken;
        } else {
            var finalPrice = jQuery('input[name=first_price]').val();
            //newLink =  jQuery('#buyACourseLink').attr('href')+'?courseType='+courseTaken;
        }
        var adminOffer = jQuery('#adminOffer').val();
        if(adminOffer != undefined && adminOffer != null){
            jQuery('#basePrice').html(finalPrice +'/-');
            var newFinalPrice = parseFloat(finalPrice) - parseFloat(parseFloat(finalPrice) * parseFloat(adminOffer)/100);  
        } else {
            jQuery('#basePrice').html('');
            var newFinalPrice = finalPrice;
        }
        jQuery('#newPrice').html(newFinalPrice +'/-');
        jQuery('input[name=base_price]').val(finalPrice);
        localStorage.setItem("courseType", courseType);
        localStorage.setItem("courseTaken", courseTaken);
        localStorage.setItem("firstPrice", firstPrice);
        localStorage.setItem("secondPrice", secondPrice);
        //jQuery('#buyACourseLink').attr('href', newLink);
        // alert(jQuery('#buyACourseLink').attr('href'));
    });
</script>
@endsection