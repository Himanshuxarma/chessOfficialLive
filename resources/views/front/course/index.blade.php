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
												<a href="javascript:void(0);" data-filter=".article_main_course">Main Courses</a>
											</li>
                                            <li class="squareButton">
												<a href="javascript:void(0);" data-filter=".article_academy_course">Academy Courses</a>
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
												    <a class="alignleft" href="{{route('courseDetails', $data->id)}}">{{$data->title}}</a> 
												    <a class="alignright" style="margin:0 0 0 0" href="javascript:void(0);"><span>{{$data->class}}</span> Session</a>
											    </h4>
												<ul class=" list-style-dot">
													@if(!empty($courseFeatured))
														@foreach($courseFeatured as $featured)
															<li class=""><span class="feature_span">{{$featured->feature}}</span></li>
														@endforeach
													@else
														<li>No Features Available</li>
													@endif
												</ul>
												@php 
													$price = !empty($priceData) && !empty($priceData->price) ? $priceData->price : (!empty($data) && !empty($data->price) ? $data->price : 0);
													$classes = !empty($data) && !empty($data->class) ? $data->class : 0;
													$perSessionPrice = (float)$price / (int)$classes;
												@endphp
												<div class="masonryInfo">
													<a href="javascript:void(0);" class="post_date">
														Price
														<strong>
															<sup>
																{{!empty($priceData) && !empty($priceData->currency) ? $priceData->currency : (!empty($countryDetails) && !empty($countryDetails->currency) ? $countryDetails->currency : '₹')}}
															</sup>
															{{!empty($priceData) && !empty($priceData->price) ? $priceData->price.'/-' : (!empty($data) && !empty($data->price) ? $data->price.'/-' : 0)}}
														</strong>
													</a>
													<a href="javascript:void(0);" class="course_perday_price"> 
														Price Per Session
														<strong>
															<sup>
																{{!empty($priceData) && !empty($priceData->currency) ? $priceData->currency : (!empty($countryDetails) && !empty($countryDetails->currency) ? $countryDetails->currency : '$')}} 
															</sup>
															{{number_format($perSessionPrice, 2).'/-'}} 
														</strong>
													</a>
												</div>
												<div class="masonryMore">
													<ul>
														<li class="squareButton light ico alignright">
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

								<div id="pagination" class="pagination">
									<ul class="pageLibrary">
										<li class="pager_pages libPage">
											Page
											<input class="navInput" readonly="readonly" type="text" size="1" value="1"> of 2
											<div id="pageNavSlider" class="boxShadow pageFocusBlock navPadding">
												<div class="sc_slider sc_slider_swiper sc_slider_controls sc_slider_controls_top sc_slider_nopagination sc_slider_noautoplay swiper-slider-container">
													<ul class="slides swiper-wrapper" data-current-slide="1">
														<li class="swiper-slide">
															<div class="pageNumber">
																<table>
																	<tbody>
																		<tr>
																			<td>
																				<a href="javascript:void(0);" class="active">1</a>
																			</td>
																			<td>
																				<a href="javascript:void(0);">2</a>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</li>
													</ul>
												</div>
												<ul class="flex-direction-nav">
													<li>
														<a class="flex-prev" href="javascript:void(0);">
														</a>
													</li>
													<li>
														<a class="flex-next" href="javascript:void(0);">
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="pager_next ico right squareButton light">
											<a href="javascript:void(0);">Next </a>
										</li>
										<li class="pager_last ico right squareButton light">
											<a href="javascript:void(0);">Last </a>
										</li>
									</ul>
								</div>

							</div>
						</section>

					</div>
				</div>
			</div>

            @endsection