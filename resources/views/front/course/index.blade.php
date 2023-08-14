@extends('front.layouts.master')
@section('content') 
@php 
$countryId = 6;
if(session()->has('SiteCountry')){
$countryId = session()->get('SiteCountry');
}
$countryDetails = App\Helpers\Helper::getCountryData($countryId); 
@endphp
 
                        
<div id="topOfPage" class="topTabsWrap">
	<div class="main">
		<div class="speedBar">
			<a class="home" href="javascript:void(0);">Home</a>
			<span class="breadcrumbs_delimiter">
				<i class="icon-right-open-mini"></i>
			</span>
			<a class="all" href="javascript:void(0);">All Course</a>
			<!-- <span class="current">Classic (3 columns)</span> -->
		</div>
		<!-- <h3 class="pageTitle h3">Classic (3 columns)</h3> -->
	</div>
</div>

<div class="mainWrap without_sidebar">
	<div class="main">
		<div class="content">

			<section class="no_margin no_padding">
				<div class="container">
					<div class="masonryWrap">
						<div class="isotopeFiltr">
							<ul>
								<li class="squareButton active">
									<a href="javascript:void(0);" data-filter="*">All</a>
								</li>
								
								<li class="squareButton">
									<a href="javascript:void(0);" data-filter=".article_main_course">One to One Courses</a>
								</li>
								<li class="squareButton">
									<a href="javascript:void(0);" data-filter=".article_academy_course">Group Sessions</a>
								</li>
								
								
							</ul>
						</div>
						<section class="masonry isotope" data-columns="3">
							@foreach($courses as $key=>$data)
							@php $courseFeatured = \Helper::getcourseFeaturedbycourse($data->id); @endphp
							@php $offers = \Helper::getoffersbycourse($data->id); @endphp
							@php $priceData =  $data->coursePrice($data->id); @endphp
							<article class="isotopeElement post_format_standard odd article_{{$data->type}} flt_71 flt_66 flt_61">
								<div class="isotopePadding">
									@if(!empty($offers) && !empty($offers->amount))
										<div class="offers-details">OFFER {{$offers->amount}}% OFF</div>
									@endif
									@if(!empty($data->image))
										@php $courseImg = asset('/uploads/course').'/'.$data->image; @endphp
										@else 
										@php $courseImg = "assets/front/images/coursedefault.jpg"; @endphp
									@endif
									<div class="thumb hoverIncrease" data-image="{{$courseImg}}" data-title="{{$data->title}}">
										<a href="{{route('courseDetails', $data->id)}}"><img class="course-list-page" alt="{{$data->title}}" src="{{$courseImg}}"></a>
									</div>
									<div>
									<h4>
										<a class="alignleft" href="{{route('courseDetails', $data->id)}}">{{strlen($data->title) > 14 ? substr($data->title, 0, 14).'...' : $data->title}}</a> 
										<a class="alignright" style="margin:0 0 0 0" href="javascript:void(0);"><span title="{{$data->class}}Sessions/Month">{{$data->class}} Sessions</span></a>
									</h4>
									<ul class=" list-style-dot">
										@if(!empty($courseFeatured))
											@foreach($courseFeatured as $featured)
												<li><span class="feature_span">{{$featured->feature}}</span></li>
											@endforeach
										@else
											<li>No Features Available</li>
										@endif
									</ul>
									@php 
										$price = !empty($priceData) && !empty($priceData->first_price) ? $priceData->first_price : (!empty($data) && !empty($data->price) ? $data->price : 0);
										$classes = !empty($data) && !empty($data->class) ? $data->class : 0;
										$perSessionPrice = (float)$price / (int)$classes;
									@endphp
									<div class="masonryInfo">
										<a href="javascript:void(0);" class="post_date">
											Price
											<strong>
												{{!empty($priceData) && !empty($priceData->currency) ? $priceData->currency : (!empty($countryDetails) && !empty($countryDetails->currency) ? $countryDetails->currency : '₹')}}
												@if(!empty($offers) && !empty($offers->offer_id))
													<?php 
														$priceDefault = !empty($priceData) && !empty($priceData->first_price) ? $priceData->first_price : (!empty($data) && !empty($data->price) ? $data->price : 0);
														$offerPercentage = $offers->amount ? $offers->amount : 0;
														$newPrice = (float)$priceDefault - ((float)$priceDefault * ((int)$offerPercentage/100));
													?>
													<s>{{!empty($priceData) && !empty($priceData->first_price) ? $priceData->first_price.'/-' : (!empty($data) && !empty($data->price) ? $data->price.'/-' : 0)}}</s>
													{{!empty($newPrice) && !empty($newPrice) ? $newPrice.'/-' : 0}}
												@else 
													{{!empty($priceData) && !empty($priceData->first_price) ? $priceData->first_price.'/-' : (!empty($data) && !empty($data->price) ? $data->price.'/-' : 0)}}
												@endif
											</strong>
										</a>
										<a href="javascript:void(0);" class="course_perday_price"> 
											Price Per Session
											<strong>
												{{!empty($priceData) && !empty($priceData->currency) ? $priceData->currency : (!empty($countryDetails) && !empty($countryDetails->currency) ? $countryDetails->currency : '$')}} 
												@if(!empty($offers) && !empty($offers->offer_id))
													<?php 
														$newPerSessionPrice = (float)$newPrice / $classes;
													?>
													<s>{{!empty($perSessionPrice) ? number_format($perSessionPrice, 2).'/-' : 0}}</s>
													{{!empty($newPerSessionPrice) && !empty($newPerSessionPrice) ? number_format($newPerSessionPrice, 2).'/-' : 0}}
												@else 
													{{number_format($perSessionPrice, 2).'/-'}}
												@endif
												
											</strong>
										</a>
									</div>
									<div class="masonryMore">
										<ul class="d-flex">
											<li class="squareButton light ico">
												<a  href="{{route('booking.Deatail', $data->id)}}">Book a Demo</a>
											</li>
											<li class="squareButton light ico view-details-button">
												<a  href="{{route('courseDetails', $data->id)}}">View Details</a>
											</li>
										</ul>
									</div>
									<span class="inlineShadow"></span>
								</div>
							</article>
							@endforeach
							
						</section>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
@endsection