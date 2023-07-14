@extends('front.layouts.master')
@section('customstyle')
 
@endsection
@section('content')
<?php
$countryId = 6;
if(session()->has('SiteCountry')){
$countryId = session()->get('SiteCountry');
}
$countryDetails = App\Helpers\Helper::getCountryData($countryId); 
?>
<div class="mainWrap without_sidebar">
	<div class="content">
		<div class="">
			<section class="post post_format_standard postAlter no_margin page type-page">
				<article class="post_content">
					<div class="post_text_area">

						<section class="orange_section">
							<div class="container custom_padding">
								<div class="sc_section bg_tint_dark">
									<div class="sc_content main ">
													<div class="columns1_5 sc_column_item sc_column_item_1 odd first">
														<a href="#">
															<div class="sc_title_icon sc_title_top sc_size_huge">
															<img src="{{asset('assets/front/images/chess-3413414.png')}}" alt="" width="50px" height="50px"/>
															</div>
															<h6 class="sc_title sc_title_iconed style_1">Funny educational games</h6>
														</a>
													</div>
													<div class="columns1_5 sc_column_item sc_column_item_2 even">
														<a href="#">
															<div class="sc_title_icon sc_title_top sc_size_huge">
																<img src="{{asset('assets/front/images/chess-3413414.png')}}" alt="" width="50px" height="50px"/>
															</div>
															<h6 class="sc_title sc_title_iconed style_1">Outside activities</h6>
														</a>
													</div>
													<div class="columns1_5 sc_column_item sc_column_item_3 odd">
														<a href="#">
															<div class="sc_title_icon sc_title_top sc_size_huge">
																<img src="{{asset('assets/front/images/chess-3413414.png')}}" alt="" width="50px" height="50px"/>
															</div>
															<h6 class="sc_title sc_title_iconed style_1">Babysitter last minute service</h6>
														</a>
													</div>
													<div class="columns1_5 sc_column_item sc_column_item_4 even">
														<a href="#">
															<div class="sc_title_icon sc_title_top sc_size_huge">
																<img src="{{asset('assets/front/images/chess-3413414.png')}}" alt="" width="50px" height="50px"/>
															</div>
															<h6 class="sc_title sc_title_iconed style_1">Drawing, coloring, and painting</h6>
														</a>
													</div>
													<div class="columns1_5 sc_column_item sc_column_item_5 odd">
														<a href="#">
															<div class="sc_title_icon sc_title_top sc_size_huge">
															<img src="{{asset('assets/front/images/chess-3413414.png')}}" alt="" width="50px" height="50px"/>
															</div>
															<h6 class="sc_title sc_title_iconed style_1">Book a Sitter!</h6>
														</a>
													</div>
									
								</div>
							</div>
						</section>

						<section class="">
							<div class="container">
								<div class="sc_content main ">
									<div class="aligncenter ">
										<h2 class="sc_title style_2 sc_title_regular">Our Classes</h2>
										<h4 class="sc_undertitle style_1">We design digital toys not just for kids, but with kids</h4>
									</div>
									<div class="course-group">

									<div class="sc_blogger sc_blogger_horizontal style_image style_image_classes">
										<div class="columnsWrap">
											<div class="courses-heading">One to One Courses</div>
											@foreach($mainCourses as $course)
											@php 
												$offers = \Helper::getoffersbycourse($course->id);
												$priceData =  $course->coursePrice($course->id);
												$price = !empty($priceData) && !empty($priceData->price) ? $priceData->price : (!empty($course) && !empty($course->price) ? $course->price : 0);
												$classes = !empty($course) && !empty($course->class) ? $course->class : 0;
												$perSessionPrice = !empty($classes) ? ((float)$price / (int)$classes) : 0;
											@endphp
												<div class="columns1_3 column_item_{{$course->id}} odd first">
													<article class="sc_blogger_item">
														@if(!empty($offers) && !empty($offers->amount))
															<div class="offers-details">OFFER {{$offers->amount}}% OFF</div>
														@endif
														<div class="thumb">
															<a href="{{route('courseDetails',$course->id)}}">
															
															@if($course->image)
															@php $courseImg = asset('/uploads/course').'/'.$course->image; @endphp
															@else 
															@php $courseImg = "assets/front/images/default.png"; @endphp
															@endif
																<img  class="home-page-course" alt="Babysitting: Dealing With Temper Tantrums" src="{{$courseImg}}">
																<div class="sc_blogger_content">
																
																	<div class="sc_blogger_content_inner">{{ strlen(strip_tags($course->description) < 100 ) ? substr(strip_tags($course->description), 0, 100).' ...' : strip_tags($course->description)}}</div>
																</div>
															</a>
														</div>
														
														<div class="reviews_summary blog_reviews p-15">
															<div class="certificate">Certificate</div>
															<div class="d-flex align-items-center justify-between mb-10">
																<h4 class="sc_blogger_title sc_title">
																	<a href="{{route('courseDetails',$course->id)}}">{{strlen($course->title) > 20 ? substr($course->title, 0, 20).'...' : $course->title}}</a>
																</h4>
																<div class="criteria_summary criteria_row">
																		<p title="{{$classes}}/Month"><strong>{{$classes}} Sessions</strong></p>
																</div>
															</div>
															<div class="d-flex row-reverse align-items-center justify-between">
																<div class="classes_price">
																	<p class="course_price">
																	{{!empty($priceData) && !empty($priceData->currency) ? $priceData->currency : (!empty($countryDetails) && !empty($countryDetails->currency) ? $countryDetails->currency : '₹')}}
																	@if(!empty($offers) && !empty($offers->offer_id))
																		<?php 
																			$priceDefault = !empty($priceData) && !empty($priceData->price) ? $priceData->price : (!empty($data) && !empty($data->price) ? $data->price : 0);
																			$offerPercentage = $offers->amount ? $offers->amount : 0;
																			$newPrice = !empty($priceDefault) ? ($priceDefault - ($priceDefault * ($offerPercentage/100))) : 0;
																		?>
																		<s>{{!empty($priceData) && !empty($priceData->price) ? $priceData->price : (!empty($data) && !empty($data->price) ? $data->price : 0)}}</s>
																		{{!empty($newPrice) && !empty($newPrice) ? $newPrice.'/-' : 0}}
																	@else 
																		{{!empty($priceData) && !empty($priceData->price) ? $priceData->price.'/-' : (!empty($data) && !empty($data->price) ? $data->price.'/-' : 0)}}
																	@endif
																	</p>
																	
																</div>
																<h5 class="course_session">
																	Price Per Session 
																	</br>
																	{{!empty($priceData) && !empty($priceData->currency) ? $priceData->currency : (!empty($countryDetails) && !empty($countryDetails->currency) ? $countryDetails->currency : '₹')}}
																	@if(!empty($offers) && !empty($offers->offer_id))
																		<?php 
																			$newPerSessionPrice = (float)$newPrice / $classes;
																		?>
																		<s>{{!empty($perSessionPrice) ? number_format($perSessionPrice, 2).'/-' : 0}}</s>
																		{{!empty($newPerSessionPrice) && !empty($newPerSessionPrice) ? number_format($newPerSessionPrice, 2).'/-' : 0}}
																	@else 
																		{{number_format($perSessionPrice, 2).'/-'}}
																	@endif
																</h5>
															</div>
														</div>
													</article>
												</div>
											@endforeach
										</div>
									</div>
									</div>
									<div class="course-group">
									<div class="sc_blogger sc_blogger_horizontal style_image style_image_classes">
									<div class="courses-heading">Group Sessions</div>
										<div class="columnsWrap">
											@foreach($academiCourses as $course)
											@php 
												$offers = \Helper::getoffersbycourse($course->id);
												$priceData =  $course->coursePrice($course->id);
												$price = !empty($priceData) && !empty($priceData->price) ? $priceData->price : (!empty($course) && !empty($course->price) ? $course->price : 0);
												$classes = !empty($course) && !empty($course->class) ? $course->class : 0;
												$perSessionPrice = !empty($classes) ? ((float)$price / (int)$classes) : 0;
											@endphp
												<div class="columns1_3 column_item_{{$course->id}} odd first">
													<article class="sc_blogger_item">
														@if(!empty($offers) && !empty($offers->amount))
															<div class="offers-details">OFFER {{$offers->amount}}% OFF</div>
														@endif
														<div class="thumb">
															<a href="{{route('courseDetails',$course->id)}}">
															
															@if($course->image)
															@php $courseImg = asset('/uploads/course').'/'.$course->image; @endphp
															@else 
															@php $courseImg = "assets/front/images/default.png"; @endphp
															@endif
																<img  class="home-page-course" alt="Babysitting: Dealing With Temper Tantrums" src="{{$courseImg}}">
																<div class="sc_blogger_content">
																
																	<div class="sc_blogger_content_inner">{{ strlen(strip_tags($course->description) < 100 ) ? substr(strip_tags($course->description), 0, 100).' ...' : strip_tags($course->description)}}</div>
																</div>
															</a>
														</div>
														
														<div class="reviews_summary blog_reviews p-15">
															<div class="certificate">Certificate</div>
															<div class="d-flex align-items-center justify-between mb-10">
																<h4 class="sc_blogger_title sc_title">
																	<a href="{{route('courseDetails',$course->id)}}">{{strlen($course->title) > 20 ? substr($course->title, 0, 20).'...' : $course->title}}</a>
																</h4>
																<div class="criteria_summary criteria_row">
																		<p title="{{$classes}}/Month"><strong>{{$classes}} Sessions</strong></p>
																</div>
															</div>
															<div class="d-flex row-reverse align-items-center justify-between">
																<div class="classes_price">
																	<p class="course_price">
																	{{!empty($priceData) && !empty($priceData->currency) ? $priceData->currency : (!empty($countryDetails) && !empty($countryDetails->currency) ? $countryDetails->currency : '₹')}}
																	@if(!empty($offers) && !empty($offers->offer_id))
																		<?php 
																			$priceDefault = !empty($priceData) && !empty($priceData->price) ? $priceData->price : (!empty($data) && !empty($data->price) ? $data->price : 0);
																			$offerPercentage = $offers->amount ? $offers->amount : 0;
																			$newPrice = !empty($priceDefault) ? ($priceDefault - ($priceDefault * ($offerPercentage/100))) : 0;
																		?>
																		<s>{{!empty($priceData) && !empty($priceData->price) ? $priceData->price : (!empty($data) && !empty($data->price) ? $data->price : 0)}}</s>
																		{{!empty($newPrice) && !empty($newPrice) ? $newPrice.'/-' : 0}}
																	@else 
																		{{!empty($priceData) && !empty($priceData->price) ? $priceData->price.'/-' : (!empty($data) && !empty($data->price) ? $data->price.'/-' : 0)}}
																	@endif
																	</p>
																	
																</div>
																<h5 class="course_session">
																	Price Per Session 
																	</br>
																	{{!empty($priceData) && !empty($priceData->currency) ? $priceData->currency : (!empty($countryDetails) && !empty($countryDetails->currency) ? $countryDetails->currency : '₹')}}
																	@if(!empty($offers) && !empty($offers->offer_id))
																		<?php 
																			$newPerSessionPrice = (float)$newPrice / $classes;
																		?>
																		<s>{{!empty($perSessionPrice) ? number_format($perSessionPrice, 2).'/-' : 0}}</s>
																		{{!empty($newPerSessionPrice) && !empty($newPerSessionPrice) ? number_format($newPerSessionPrice, 2).'/-' : 0}}
																	@else 
																		{{number_format($perSessionPrice, 2).'/-'}}
																	@endif
																</h5>
															</div>
														</div>
													</article>
												</div>
											@endforeach
										</div>
									</div>
</div>
									<div class="sc_section bg_tint_none sc_aligncenter margin_top_middle">
										<div class="">
											<div class="sc_button sc_button_style_global sc_button_size_banner squareButton global banner h-auto">
												<a  href="{{route('courseList')}}" class="" >More Courses</a>
											</div>
										</div>
									</div>
								</div>

							</div>
						</section>

						<section class="skyblue_section bg_pattern_6">
							<div class="container">
								<div class="sc_section  bg_tint_light">
									<div class="sc_content main ">
										<div class="aligncenter ">
											<h2 class="sc_title sc_title_regular">Testimonials</h2>
											<h4 class="sc_undertitle style_2">We have gathered the best team of teachers and trainers</h4>
										</div>
										<div class="sc_team no_padding">
											<div class="sc_columns">
												
										<div class="owl-carousel testimonials owl-theme">
												@foreach($testimonials as $data)
												<div class="item">
													<div class="sc_team_item sc_team_item_1 odd first">
														<div class="sc_team_item_avatar">
														
														@if(empty($data->image))
														@php $testimonialsImg = asset('/uploads/testimonials').'/'.$data->image; @endphp
														@else
														@php $testimonialsImg = '/assets/front/images/chess-1019908.jpg'; @endphp
														@endif
															<img alt="team-5.jpg" src="{{$testimonialsImg}}">
														</div>
														<div class="sc_team_item_info">
															<h3 class="sc_team_item_title"><a href="javascript:void(0);">{{$data->title}}</a></h3>
															<?php $description = strip_tags($data->description); ?>
															<div class="sc_team_item_position theme_accent2"><?php echo strlen($description) > 100  ? substr($description, 0, 100).' ...' : $description; ?></div>
															<ul class="sc_team_item_socials">
																<li>
																	<a href="javascript:void(0);" class="social_icons social_twitter twitter twitter_image" target="_blank">
																		<span></span>
																	</a>
																</li>
																<li>
																	<a href="javascript:void(0);" class="social_icons social_facebook facebook facebook_image" target="_blank">
																		<span></span>
																	</a>
																</li>
																<li>
																	<a href="javascript:void(0);" class="social_icons social_gplus gplus gplus_image" target="_blank">
																		<span></span>
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
												@endforeach
											</div>
										  </div>
										</div>
									</div>
								</div>
							</div>
						</section>
						<section class="skyblue_section bg_pattern_6 testimonial_form">
						<div class="container main p-0">
							<div class="form-container sc_columns p-0">
								<div class="sc_column_item">
									<div class="user-dashboard sc_contact_form sc_contact_form_contact">
										<h2 class="title">
											Post your review
										</h2>
										<form class="contact_1" method="post" action="{{route('reviewSave')}}" enctype="multipart/form-data">
											@csrf
											<div class="columnsWrap">
												<div class="columns1_2">
													<label class="required" for="title"><strong>Name</strong></label>
													<input type="text" name="title" id="title" value="{{old('title')}}">
													@if ($errors->has('title'))
														<span class="text-danger">{{ $errors->first('title') }}</span>
													@endif
												</div>
												<div class="columns1_2">
													<label class="required" for="country_id"><strong> Country</strong></label>
													<select id="country_id" class="form-control" name="country_id">
														<option value="">--Select Country--</option>
														@foreach($country as $data)
															<option value="{{$data->id}}" @if($countryId && $countryId == $data->id) selected="selected" @endif >{{ $data->country }}</option>
														@endforeach
													</select>
													@if ($errors->has('country_id'))
													<span class="text-danger">{{ $errors->first('country_id') }}</span>
													@endif
												</div>
											</div>
											<div class="columnsWrap">
												<div class="columns1_2">
													<label class="required" for="image"><strong>Image</strong></label>
													<input type="file" name="image" id="image">
													@if ($errors->has('image'))
														<span class="text-danger">{{ $errors->first('image') }}</span>
													@endif
												</div>											
											</div>
											<div class="message">
												<div class="">
													<label class="required" for="description"><strong>Your Review</strong></label>
													<textarea id="description" class="textAreaSize" name="description">{{old('description')}}</textarea>
													@if ($errors->has('description'))
														<span class="text-danger">{{ $errors->first('description') }}</span>
													@endif
												</div>
											</div>
											<div class="sc_contact_form_button">
												<div class="squareButton sc_button_size sc_button_style_global global ico">
													<button type="submit" class="contact_form_submit icon-comment-1">Post Review</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
					</div>
						</section>

						<section class="no_padding">
							<div class="container">
								<div class="sc_parallax light" data-parallax-speed="0.3" data-parallax-x-pos="50%" data-parallax-y-pos="50%">
									<div class="sc_parallax_content parallax_image_3">
										<div class="sc_content main ">
											<div class="columnsWrap sc_columns sc_columns_count_2">
												<div class="columns1_2 sc_column_item sc_column_item_1 odd first">
												<img src="{{asset('assets/front/images/chess-3413414.png')}}" alt="" width="400px" height="400px"/>
												</div>
												<div class="columns1_2 sc_column_item sc_column_item_2 even text-sm-center">
													<h3 class="sc_title style_3">We will take care of your kids</h3>
													<span class="sc_highlight style_2">Aenean nec vestibulum dui. Sed vestibulum varius interdum. Nulla euismod venenatis erat quis interdum. Nullam leo lorem, porttitor ac blandit eget, venenatis vel purus. Mauris vitae mi risus.</span>
													<div class="margin_top_small">
														<div class="sc_button sc_button_style_global sc_button_size_huge squareButton global huge">
															<a href="{{route('Buy.Course')}}" class="">Buy Course</a>
														</div>
														<div class="sc_button sc_button_style_global sc_button_size_huge squareButton global huge m-0">
															<a href="{{url('booking')}}" class="btns-top">Book a Demo</a>
														</div>
													</div>
												</div>
											</div>
											<div class="sc_line sc_line_style_wavy_orange margin_top_large"></div>
										</div>
									</div>
								</div>
							</div>
						</section>

						<section class="">
							<div class="container">
								<div class="sc_content main ">
									<div class="d-flex align-items-center justify-between">
										<div class="w-full">
											<h2 class="sc_title style_3 text-md-center">Subscribe us for FREE!</h2>
											<div class="sc_section bg_tint_none margin_bottom_small">
												<span class="sc_highlight style_3">To get all the offer updates, please subscribe us.</span>
											</div>
											<form class="subscribe" action="{{route('contactsSave')}}" method="post">
												@csrf
												<div class="sc_emailer inputSubmitAnimation sFocus rad4 opened">
													<input type="hidden" name="contact_type" value="subscription">
													<input type="hidden" name="full_name" value="Via Subscription">
													<input type="hidden" name="phone" value="9461159397">
													<input type="hidden" name="subject" value="Subscription">
													<input type="hidden" name="message" value="For further uses">
													<input type="text" class="sInput" name="email" value="" placeholder="Please, enter you email address.">
												</div>
												<div class="sc_button squareButton light huge subscription_submit_button">
													<button type="submit" class="submit" title="Submit">Subscribe</button>
												</div>
											</form>
										</div>
										<div class="d-sm-none ">
											<figure class="sc_image  sc_image_align_right sc_image_shape_square m-0">
												<img src="{{asset('assets/front/images/email.png')}}" alt=""/>
												<figcaption>
													<span class="icon inherit"> </span>
												</figcaption>
											</figure>
										</div>
									</div>
								</div>
							</div>
						</section>

					</div>
				</article>
			</section>
		</div>
	</div>
</div>      
@endsection