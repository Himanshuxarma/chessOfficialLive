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
                        <h2 class="post_title d-flex">
                            @php $priceData =  $courses->coursePrice($courses->id); @endphp

                            <a href="javascript:void();">{{$courses->title}}</a>
                            <a class="@if(!empty($offers) && !empty($offers->offer_id)) price_with_offer @else icon_money @endif" href="javascript:void(0);">
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
                                    <input type="hidden" name="base_price" value="{{!empty($priceData) && !empty($priceData->first_price) ? $priceData->first_price.'/-' : (!empty($data) && !empty($data->price) ? $data->price.'/-' : 0)}}">
                                    <input type="hidden" name="new_price" value="{{!empty($newPrice) && !empty($newPrice) ? $newPrice.'/-' : 0}}">
                                    <s id="basePrice">{{!empty($priceData) && !empty($priceData->first_price) ? $priceData->first_price.'/-' : (!empty($data) && !empty($data->price) ? $data->price.'/-' : 0)}}</s>
                                    <strong id="newPrice">{{!empty($newPrice) && !empty($newPrice) ? $newPrice.'/-' : 0}}</strong>
                                @else
                                    <input type="hidden" name="base_price" value="{{!empty($priceData) && !empty($priceData->first_price) ? $priceData->first_price.'/-' : (!empty($data) && !empty($data->price) ? $data->price.'/-' : 0)}}"> 
                                    <strong id="basePrice">{{!empty($priceData) && !empty($priceData->first_price) ? $priceData->first_price.'/-' : (!empty($data) && !empty($data->price) ? $data->price.'/-' : 0)}}</strong>
                                @endif
                                <input type="hidden" name="first_price" value="{{isset($priceData->first_price) && !empty($priceData->first_price) ? $priceData->first_price : 0}}">
                                <input type="hidden" name="second_price" value="{{isset($priceData->second_price) && !empty($priceData->second_price) ? $priceData->second_price : 0}}">
                            </a>
                        </h2>
                        <div class="sc_section columns1_2 post_thumb thumb">
                            <a href="javascript:void(0);">
                                @if(!empty($courses->image))
                                	@php $courseImg = asset('/uploads/course').'/'.$courses->image; @endphp
                                @else
                                	@php $courseImg = '/assets/front/images/default.png'; @endphp
                                @endif
                                <img class="course-details-page" alt="Babysitter and Nanny Hiring Resources" src="{{$courseImg}}">
                            </a>
                        </div>
                        @php $offers = \Helper::getoffersbycourse($courses->id); @endphp
                        <div class="postStandard">
                            <p>{{$courses->description}} </p>
                        </div>
                        <div class="course_detail_button">
                            <ul>
                                <li class="squareButton light ico ">
                                    <a href="javascript:void(0);"> {{$courses->class}} Session</a>
                                </li>
                                <li class="squareButton light ico">
                                    
                                </li>
                                <li class="squareButton light ico">
                                    <a class="icon-year" title="Comments - 1"
                                        href="javascript:void(0);">{{$courses->age}} Age</a>
                                </li>
                                <li class="squareButton light ico">
                                    <a class="icon-classroom" title="Comments - 1"
                                        href="javascript:void(0);">{{$courses->batch}} Batch</a>
                                </li>
                                <li class="squareButton light ico">
                                    <a class="icon-comment-1" title="Comments - 1"
                                        href="javascript:void(0);">{{$courses->hrs_training}} Hrs Training</a>
                                </li>
                                <li class="squareButton light ico">
                                    <a class="icon-comment-1" title="Comments - 1"
                                        href="javascript:void(0);">{{$courses->format}} Format</a>
                                </li>
                                <li class="squareButton light ico">
                                    <a class="icon-clock" title="Comments - 1"
                                        href="javascript:void(0);">{{$courses->duration}} Duration</a>
                                </li>
							</ul>
                            </br>
                            <div class="typecourse">
                                <p class="lablecourse" for="course_type"> Course Type</p>
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
							<div class="booking_demo">
								<div class="booking-demo-1">
									<ul class="for-mobile">
                                        <li class="squareButton light ico">
                                            <a href="{{url('booking/'. $courses->id)}}">Book A Demo</a>
                                        </li>
                                        <li class="squareButton light ico">
                                            <a href="{{route('Buy.Course',$courses->id)}}" id="buyACourseLink">Buy A Course</a>
                                        </li>
								    </ul>
								</div>
                            </div>
                    </article>

                    @if (!empty($curriculum))
                    @foreach($curriculum as $key=> $data)

                    <article class="post_format_standard  hrShadow  post @if($key % 2 == 0)postRight even @endif postLeft  odd">

                        <div class="columns1_2  @if($key % 2 == 0)sc_alignright  @endif sc_alignleft"> 
                            <div class="">
                                <div class="course_curriculum">
								@if(!empty($data->image))
                                	@php $curriculumImg = asset('/uploads/course_curriculum').'/'.$data->image; @endphp
                                @else
                                	@php $curriculumImg = '/assets/front/images/sketch-4029522.jpg'; @endphp
                                @endif
                                    <img src="{{$curriculumImg}}" data-zoom-image="images/900x600.png" alt="" />
                                </div>
                            </div>
                        </div>
                        <h2 class="post_title">
                            <a href="javascript:void(0);">{{$data->title}}</a>
                        </h2>
                        <div class="postStandard">
                            <p>{{$data->description}}</p>
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
    jQuery(document).on('change', '#course_type', function(){
        var courseTaken = jQuery(this).val();
        var courseType = jQuery(this).data('course-type');
        var firstPrice = jQuery('input[name=first_price]').val();
        var secondPrice = jQuery('input[name=second_price]').val();
        // let courseTakenVariable = "";
        // if(courseType=="main_course"){
        //     courseTakenHalf = "half_course";
        //     courseTakenFull = "full_course";
        // } else {
        //     courseTakenHalf = "";
        //     courseTakenFull = "full_course";
        // }
        if(courseTaken == "half_course"){
            jQuery('#basePrice').html(jQuery('input[name=second_price]').val() +'/-');
            jQuery('input[name=base_price]').val(jQuery('input[name=second_price]').val());
            //newLink =  jQuery('#buyACourseLink').attr('href')+'?courseType='+courseTaken;
        } else {
            jQuery('#basePrice').html(jQuery('input[name=first_price]').val() +'/-');
            jQuery('input[name=base_price]').val(jQuery('input[name=first_price]').val());
            //newLink =  jQuery('#buyACourseLink').attr('href')+'?courseType='+courseTaken;
        }
        localStorage.setItem("courseType", courseType);
        localStorage.setItem("courseTaken", courseTaken);
        localStorage.setItem("firstPrice", firstPrice);
        localStorage.setItem("secondPrice", secondPrice);
        // alert(newLink);
        //jQuery('#buyACourseLink').attr('href', newLink);
        // alert(jQuery('#buyACourseLink').attr('href'));
    });
</script>
@endsection