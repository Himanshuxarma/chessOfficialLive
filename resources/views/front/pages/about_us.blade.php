@extends('front.layouts.master')
@section('content')
<div id="topOfPage" class="topTabsWrap">
				<div class="main">
					<div class="speedBar">
						<a class="home" href="javascript:void(0);">Home</a>
						<span class="breadcrumbs_delimiter">
							<i class="icon-right-open-mini"></i>
						</span>
						<a class="all" href="javascript:void(0);">All Posts</a>
						<span class="breadcrumbs_delimiter">
							<i class="icon-right-open-mini"></i>
						</span>
						<span class="current">About Us</span>
					</div>
					<h3 class="pageTitle h3">About Us</h3>
				</div>
			</div>

			<div class="mainWrap without_sidebar">
				<div class="main">
					<div class="content">
						<section class="post no_margin post_format_standard postAlter page type-page">
							<article class="post_content">
								<div class="post_text_area">

									<section class="no_padding">
										<div class="container">

											<div class="columnsWrap sc_columns custom_columns sc_columns_count_2">
												<div class="columns1_2 sc_column_item sc_column_item_1 odd first">
													<figure class="sc_image  sc_image_shape_square">
														<img src="{{asset('assets/front/images/testimage.jpeg')}}" alt="">
														<figcaption>
														</figcaption>
													</figure>
												</div>
												<div class="columns1_2 sc_column_item sc_column_item_2 even">
													<h1 class="sc_title sc_title_regular">Short story about our company</h1>
													<div class="">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br>
														Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
													</div>
												</div>
											</div>

										</div>
									</section>

									<section class="no_padding">
										<div class="container">
											<div class="aligncenter margin_top_middle margin_bottom_small">
												<h2 class="sc_title sc_title_regular">Meet Our Team</h2>
											</div>
											<div class="sc_team">
												<div class="sc_columns columnsWrap">
													<div class="columns1_4">
														<div class="sc_team_item sc_team_item_1 odd first">
															<div class="sc_team_item_avatar">
																<img alt="" src="{{asset('assets/front/images/team1.jpg')}}"style="height: 235px;width: 100%;" style="height: 235px;width: 100%;">
																<div class="sc_team_item_description">The Politics theme will do you an excellent job being any kind of website you wish.</div>
															</div>
															<div class="sc_team_item_info">
																<h3 class="sc_team_item_title">Sonu Singh</h3>
																<div class="sc_team_item_position theme_accent2">Manager</div>
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
													<div class="columns1_4">
														<div class="sc_team_item sc_team_item_2 even">
															<div class="sc_team_item_avatar">
																<img alt="" src="{{asset('assets/front/images/team2.jpg')}}"style="height: 235px;width: 100%;">
																<div class="sc_team_item_description">The Politics theme will do you an excellent job being any kind of website you wish.</div>
															</div>
															<div class="sc_team_item_info">
																<h3 class="sc_team_item_title">Earl Stone</h3>
																<div class="sc_team_item_position theme_accent2">Finance Manager</div>
																<ul class="sc_team_item_socials">
																	<li>
																		<a href="javascript:void(0);" class="social_icons social_facebook facebook facebook_image" target="_blank">
																			<span></span>
																		</a>
																	</li>
																	<li>
																		<a href="javascript:void(0);" class="social_icons social_twitter twitter twitter_image" target="_blank">
																			<span></span>
																		</a>
																	</li>
																	<li>
																		<a href="javascript:void(0);" class="social_icons social_gplus gplus gplus_image" target="_blank">
																			<span></span>
																		</a>
																	</li>
																	<li>
																		<a href="javascript:void(0);" class="social_icons social_dribbble dribbble dribbble_image" target="_blank">
																			<span></span>
																		</a>
																	</li>
																</ul>
															</div>
														</div>
													</div>
													<div class="columns1_4">
														<div class="sc_team_item sc_team_item_3 odd">
															<div class="sc_team_item_avatar">
																<img alt="" src="{{asset('assets/front/images/team3.jpg')}}"style="height: 235px;width: 100%;">
																<div class="sc_team_item_description">The Politics theme will do you an excellent job being any kind of website you wish.</div>
															</div>
															<div class="sc_team_item_info">
																<h3 class="sc_team_item_title">Nora Reed</h3>
																<div class="sc_team_item_position theme_accent2">Volunteer</div>
																<ul class="sc_team_item_socials">
																	<li>
																		<a href="javascript:void(0);" class="social_icons social_facebook facebook facebook_image" target="_blank">
																			<span></span>
																		</a>
																	</li>
																	<li>
																		<a href="javascript:void(0);" class="social_icons social_twitter twitter twitter_image" target="_blank">
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
													<div class="columns1_4">
														<div class="sc_team_item sc_team_item_4 even">
															<div class="sc_team_item_avatar">
																<img alt="" src="{{asset('assets/front/images/team4.jpg')}}"style="height: 235px;width: 100%;">
																<div class="sc_team_item_description">The Politics theme will do you an excellent job being any kind of website you wish.</div>
															</div>
															<div class="sc_team_item_info">
																<h3 class="sc_team_item_title">Jessica Brown</h3>
																<div class="sc_team_item_position theme_accent2">Volunteer</div>
																<ul class="sc_team_item_socials">
																	<li>
																		<a href="javascript:void(0);" class="social_icons social_facebook facebook facebook_image" target="_blank">
																			<span></span>
																		</a>
																	</li>
																	<li>
																		<a href="javascript:void(0);" class="social_icons social_dribbble dribbble dribbble_image" target="_blank">
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
												</div>
											</div>
											<div class="sc_line sc_line_style_solid margin_bottom_middle"></div>
										</div>
									</section>	

									<section class="no_padding">
										<div class="container">
											<div class="columnsWrap sc_columns sc_columns_count_3">
												<div class="columns2_3 sc_column_item sc_column_item_1 odd first span_2">
													<div id="sc_skills_diagram_652576068" class="sc_skills sc_skills_arc" data-type="arc" data-subtitle="Skills">
														<h2>Course</h2>
														<div class="sc_skills_legend">
															<ul>
                                                                @if(!empty($courses) && count($courses) > 0)
                                                                @foreach($courses as $course)
																    <li>{{$course->title}}</li>
                                                                @endforeach
                                                                @endif
															</ul>
														</div>
														<div id="sc_skills_diagram_652576068_diagram" class="sc_skills_arc_canvas"></div>
														<div class="sc_skills_data">
															<div class="arc">
																<input type="hidden" class="text" value="{{$course->title}}">
																<input type="hidden" class="percent" value="95">
																<input type="hidden" class="color" value="rgba(27,180,185,1)">
															</div>
															<div class="arc">
																<input type="hidden" class="text" value="CSS3">
																<input type="hidden" class="percent" value="90">
																<input type="hidden" class="color" value="rgba(27,180,185,0.9)">
															</div>
															<div class="arc">
																<input type="hidden" class="text" value="HTML5">
																<input type="hidden" class="percent" value="80">
																<input type="hidden" class="color" value="rgba(27,180,185,0.8)">
															</div>
															<div class="arc">
																<input type="hidden" class="text" value="PHP">
																<input type="hidden" class="percent" value="53">
																<input type="hidden" class="color" value="rgba(27,180,185,0.7)">
															</div>
															<div class="arc">
																<input type="hidden" class="text" value="MySQL">
																<input type="hidden" class="percent" value="45">
																<input type="hidden" class="color" value="rgba(27,180,185,0.6)">
															</div>
														</div>
													</div>
												</div>
												<div class="columns1_3 sc_column_item sc_column_item_3 odd after_span_2">
													<h2 class="sc_title sc_title_regular">Country</h2>
													<div class="sc_skills sc_skills_bar sc_skills_horizontal" data-type="bar" data-subtitle="Skills" data-dir="horizontal">
                                                        @if(!empty($countries) && count($countries) > 0)
                                                        @foreach($countries as $data)
														<div class="sc_skills_info">{{$data->country}}</div>
														<div class="sc_skills_item sc_skills_style_1 odd first">
															<div class="sc_skills_count">
																<div class="sc_skills_total" data-start="0" data-stop="73" data-step="1" data-max="100" data-speed="40" data-duration="3920" data-ed="%">0%</div>
															</div>
														</div>
                                                        @endforeach
                                                        @endif
														<!-- <div class="sc_skills_info">Spanish</div>
														<div class="sc_skills_item sc_skills_style_1 even">
															<div class="sc_skills_count">
																<div class="sc_skills_total" data-start="0" data-stop="66" data-step="1" data-max="100" data-speed="35" data-duration="2310" data-ed="%">0%</div>
															</div>
														</div> -->
														<!-- <div class="sc_skills_info">French</div>
														<div class="sc_skills_item sc_skills_style_1 odd">
															<div class="sc_skills_count">
																<div class="sc_skills_total" data-start="0" data-stop="87" data-step="1" data-max="100" data-speed="34" data-duration="2958" data-ed="%">0%</div>
															</div>
														</div>
														<div class="sc_skills_info">Latin</div>
														<div class="sc_skills_item sc_skills_style_1 even">
															<div class="sc_skills_count">
																<div class="sc_skills_total" data-start="0" data-stop="82" data-step="1" data-max="100" data-speed="32" data-duration="2624" data-ed="%">0%</div>
															</div>
														</div> -->
														<!-- <div class="sc_skills_info">Others</div>
														<div class="sc_skills_item sc_skills_style_1 odd">
															<div class="sc_skills_count">
																<div class="sc_skills_total" data-start="0" data-stop="76" data-step="1" data-max="100" data-speed="19" data-duration="1444" data-ed="%">0%</div>
															</div>
														</div> -->
													</div>
												</div>
											</div>
											<div class="sc_line sc_line_style_solid margin_bottom_middle"></div>
										</div>
									</section>	

									<section class="no_padding">
										<div class="container">
											<div class="aligncenter">
												<h2 class="sc_title sc_title_regular">Services</h2>
											</div>
											<div class="sc_skills sc_skills_counter" data-type="counter" data-subtitle="Skills">
												<div class="columnsWrap sc_skills_columns">
													<div class="sc_skills_column columns1_5">
														<div class="sc_skills_item sc_skills_style_2 odd first">
															<div class="sc_skills_count">
																<div class="sc_skills_total" data-start="0" data-stop="68" data-step="1" data-max="100" data-speed="39" data-duration="2652" data-ed="%">0%</div>
															</div>
															<div class="sc_skills_info">Clean Design</div>
														</div>
													</div>
													<div class="sc_skills_column columns1_5">
														<div class="sc_skills_item sc_skills_style_2 even">
															<div class="sc_skills_count">
																<div class="sc_skills_total" data-start="0" data-stop="72" data-step="1" data-max="100" data-speed="16" data-duration="1152" data-ed="%">0%</div>
															</div>
															<div class="sc_skills_info">Incredible Flexible</div>
														</div>
													</div>
													<div class="sc_skills_column columns1_5">
														<div class="sc_skills_item sc_skills_style_2 odd">
															<div class="sc_skills_count">
																<div class="sc_skills_total" data-start="0" data-stop="98" data-step="1" data-max="100" data-speed="10" data-duration="980" data-ed="%">0%</div>
															</div>
															<div class="sc_skills_info">Responsive</div>
														</div>
													</div>
													<div class="sc_skills_column columns1_5">
														<div class="sc_skills_item sc_skills_style_2 even">
															<div class="sc_skills_count">
																<div class="sc_skills_total" data-start="0" data-stop="45" data-step="1" data-max="100" data-speed="32" data-duration="1440" data-ed="%">0%</div>
															</div>
															<div class="sc_skills_info">SEO Ready</div>
														</div>
													</div>
													<div class="sc_skills_column columns1_5">
														<div class="sc_skills_item sc_skills_style_2 odd">
															<div class="sc_skills_count">
																<div class="sc_skills_total" data-start="0" data-stop="78" data-step="1" data-max="100" data-speed="20" data-duration="1560" data-ed="%">0%</div>
															</div>
															<div class="sc_skills_info">Free support</div>
														</div>
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