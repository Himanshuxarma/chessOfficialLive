@extends('front.layouts.master')
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
										<div class="columnsWrap sc_columns sc_columns_count_5">
											<div class="columns3_5 sc_column_item sc_column_item_1 odd first span_3">
												<span class="sc_highlight style_1">Select educational or entertaining course, time and teacher for your children.</span>
											</div>
											<div class="columns2_5 sc_column_item sc_column_item_4 even span_2 after_span_3">
												<div class="">
													<div class="sc_button sc_button_style_light sc_button_size_huge alignright squareButton light huge">
														<a href="{{route('Buy.Course')}}" class="style_1">Buy a Course</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>

						<section class="">
							<div class="container">
								<div class="sc_content main ">
									<div class="aligncenter margin_bottom_middle">
										<h2 class="sc_title style_2 sc_title_regular">Our Classes</h2>
										<h4 class="sc_undertitle style_1">We design digital toys not just for kids, but with kids</h4>
									</div>
									<div class="sc_blogger sc_blogger_horizontal style_image style_image_classes">
										<div class="columnsWrap">
											@foreach($courses as $course)
											<div class="columns1_3 column_item_{{$course->id}} odd first">
												<article class="sc_blogger_item">
												<div class="offers-details">OFFER 20% OFF</div>
													<div class="thumb">
														<a href="{{route('courseDetails',$course->id)}}">
														
														@if($course->image)
														@php $courseImg = asset('/uploads/course').'/'.$course->image; @endphp
														@else 
														@php $courseImg = "assets/front/images/default.png"; @endphp
														@endif
														@php $offers = \Helper::getoffersbycourse($course->id); @endphp
														@php $priceData =  $course->coursePrice($course->id); @endphp
															<img  class="home-page-course" alt="Babysitting: Dealing With Temper Tantrums" src="{{$courseImg}}">
															<div class="sc_blogger_content">
															
																<div class="sc_blogger_content_inner">{{ strlen(strip_tags($course->description) < 100 ) ? substr(strip_tags($course->description), 0, 100).' ...' : strip_tags($course->description)}}</div>
															</div>
														</a>
													</div>
													<h4 class="sc_blogger_title sc_title">
														<a href="{{route('courseDetails',$course->id)}}">{{$course->title}}</a>
													</h4>
													<div class="reviews_summary blog_reviews">
														<div class="classes_price">
															<p class="course_price">
															{{!empty($priceData) && !empty($priceData->currency) ? $priceData->currency : (!empty($countryDetails) && !empty($countryDetails->currency) ? $countryDetails->currency : '₹')}}</strong></sup>{{!empty($priceData) && !empty($priceData->price) ? $priceData->price : 0}}	
															</p>
														</div>
														@php 
															$price = !empty($course) && !empty($course->price) ? $course->price : 0;
															$classes = !empty($course) && !empty($course->class) ? $course->class : 0;
															$perSessionPrice =  round( (float)$price/$classes) 
														@endphp
														<div class="criteria_summary criteria_row">
																<p><strong>{{$classes}} Sessions</strong></p>
														</div>
													</div>
												</article>
											</div>
											@endforeach
										</div>
									</div>

									<div class="sc_section bg_tint_none sc_aligncenter margin_top_middle">
										<div class="">
											<div class="sc_button sc_button_style_global sc_button_size_banner squareButton global banner">
												<a href="{{route('courseList')}}" class="">More Courses</a>
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
										<div class="aligncenter margin_bottom_middle">
											<h2 class="sc_title sc_title_regular">Testimonials</h2>
											<h4 class="sc_undertitle style_2">We have gathered the best team of teachers and trainers</h4>
										</div>
										<div class="sc_team no_padding">
											<div class="sc_columns columnsWrap">
												@foreach($testimonials as $data)
												<div class="columns1_3">
													<div class="sc_team_item sc_team_item_1 odd first">
														<div class="sc_team_item_avatar">
														
														@if(!empty($data->image))
														@php $testimonialsImg = asset('/uploads/testimonials').'/'.$data->image; @endphp
														@else
														@php $testimonialsImg = '/assets/front/images/370x370.png'; @endphp
														@endif
															<img alt="team-5.jpg" src="{{$testimonialsImg}}">
															<div class="sc_team_item_description">Lorem ipsum dolor sit amet consectetur adipiscing elit morbi lobortis odio sapien.</div>
														</div>
														<div class="sc_team_item_info">
															<h3 class="sc_team_item_title"><a href="javascript:void(0);">{{$data->title}}</a></h3>
															<div class="sc_team_item_position theme_accent2">{{ strlen(strip_tags($data->description) < 100 ) ? substr(strip_tags($data->description), 0, 50).' ...' : strip_tags($data->description)}}</div>
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
						</section>

						<section class="no_padding">
							<div class="container">
								<div class="sc_parallax light" data-parallax-speed="0.3" data-parallax-x-pos="50%" data-parallax-y-pos="50%">
									<div class="sc_parallax_content parallax_image_3">
										<div class="sc_content main ">
											<div class="columnsWrap sc_columns sc_columns_count_2">
												<div class="columns1_2 sc_column_item sc_column_item_1 odd first"></div>
												<div class="columns1_2 sc_column_item sc_column_item_2 even">
													<h3 class="sc_title style_3">We will take care of your kids</h3>
													<span class="sc_highlight style_2">Aenean nec vestibulum dui. Sed vestibulum varius interdum. Nulla euismod venenatis erat quis interdum. Nullam leo lorem, porttitor ac blandit eget, venenatis vel purus. Mauris vitae mi risus.</span>
													<div class="margin_top_middle">
														<div class="sc_button sc_button_style_global sc_button_size_huge squareButton global huge">
															<a href="#" class="">Purchase</a>
														</div>
														<div class="sc_button sc_button_style_global sc_button_size_huge squareButton global huge">
															<a href="#" class="">More</a>
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
									<div class="columnsWrap sc_columns sc_columns_count_4">
										<div class="columns3_4 sc_column_item sc_column_item_1 odd first span_3">
											<h2 class="sc_title style_4">Sign up for FREE!</h2>
											<div class="sc_section bg_tint_none margin_bottom_small">
												<span class="sc_highlight style_3">Aliquam ullamcorper sodales urna bibendum nibh suscipit ut interdum.s.</span>
											</div>
											<div class="sc_emailer inputSubmitAnimation sFocus rad4 opened">
												<form>
													<input type="text" class="sInput" name="email" value="" placeholder="Please, enter you email address.">
												</form>
												<a href="#" class="sc_emailer_button searchIcon aIco mail" title="Submit" data-group="Group">
												</a>
											</div>
										</div>
										<div class="columns1_4 sc_column_item sc_column_item_4 even after_span_3">
											<figure class="sc_image  sc_image_align_right sc_image_shape_square">
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