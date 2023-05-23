@extends('front.layouts.master')
@section('content')
<div class="widgetTabs">
				<div id="topOfPage" class="topTabsWrap">
					<div class="main">
						<h3 class="pageTitle h3">{{$courses->title}}</h3>
					</div>
				</div>
				<div class="mainWrap without_sidebar">
					<div class="main">
						<div class="content">

							<aside id="tabBlog" class="blogContent">
								<article class="post_format_standard postCenter hrShadow odd post">
									
									<h2 class="post_title">
									<a href="javascript:void(0);">{{$courses->title}}</a>
									</h2>
									<div class="sc_section columns1_2 post_thumb thumb">
										<a href="javascript:void(0);">
                                        @if(!empty($courses->image))
                                        @php $courseImg = asset('/uploads/course').'/'.$courses->image; @endphp
										@else
										@php $courseImg = '/assets/front/images/default.png'; @endphp
                                        @endif
											<img class= "course-details-page"alt="Babysitter and Nanny Hiring Resources" src="{{$courseImg}}">
										</a>
									</div>
									<div class="postStandard">
										<p>{{$courses->description}} </p>
									</div>
									<div class="">
										<ul>
											<li class="squareButton light ico">
												<a href="javascript:void(0);"> {{$courses->class}} Session</a>
											</li>
											<li class="squareButton light ico">
												<a class="icon-eye" title="Views - 198" href="javascript:void(0);">{{$courses->price}} Price</a>
											</li>
											<li class="squareButton light ico">
												<a class="icon-comment-1" title="Comments - 1" href="javascript:void(0);">{{$courses->age}} Age</a>
											</li>
                                            <li class="squareButton light ico">
												<a class="icon-comment-1" title="Comments - 1" href="javascript:void(0);">{{$courses->batch}} Batch</a>
											</li>
                                            <li class="squareButton light ico">
												<a class="icon-comment-1" title="Comments - 1" href="javascript:void(0);">{{$courses->hrs_training}} Hrs Training</a>
											</li>
                                            <li class="squareButton light ico">
												<a class="icon-comment-1" title="Comments - 1" href="javascript:void(0);">{{$courses->format}} Format</a>
											</li>
                                            <li class="squareButton light ico">
												<a class="icon-comment-1" title="Comments - 1" href="javascript:void(0);">{{$courses->duration}} Duration</a>
											</li>
											<li class="squareButton light ico likeButton like" data-postid="791" data-likes="6" data-title-like="Like" data-title-dislike="Dislike">
												<a class="icon-heart-1" title="Like - 6" href="javascript:void(0);">
													<span class="likePost">6</span>
												</a>
											</li>
										</ul>
									</div>
								</article>
                                
							@if (!empty($curriculum))
                                @foreach($curriculum as $data)
								<article class="post_format_standard postRight hrShadow even post">
									<div class="post_info infoPost">
										Posted
										<a href="#" class="post_date">July 20, 2014</a>
										<span class="separator">|</span>
										by
										<a href="#" class="post_author">admin</a>
										<span class="separator">|</span>
										<span class="post_cats">
											in
											<a class="cat_link" href="#">Post formats fullwidth</a>
										</span>
									</div>
									<div class="sc_section  columns1_2 sc_alignright">
										<div class="sc_border sc_border_light">
											<div class="sc_zoom">
												<img src="{{asset('assets/front/images/415x310.png')}}" data-zoom-image="images/900x600.png" alt=""/>
											</div>
										</div>
									</div>
									<h2 class="post_title">
									<a href="#">{{$data->title}}</a>
									</h2>
									<div class="postStandard">
										<p>
											<div class="sc_section">
												<br/>
												<div class="sc_title_image sc_title_left sc_size_medium">
													<img src="{{asset('assets/front/images/lens_icon_retina.png')}}" alt=""/>
												</div>
												<h3 class="sc_title sc_title_iconed">Retina Ready</h3>
												<br/>
												{{$data->description}}.<br/>
											</div>
											<br/>
											<div class="sc_section margin_top_small">
												<br/>
												<div class="sc_title_image sc_title_left sc_size_medium">
													<img src="{{asset('assets/front/images/hand_icon_retina.png')}}" alt=""/>
												</div>
												<h3 class="sc_title sc_title_iconed">Tablet friendly</h3>
												<br/>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br/>
											</div>
										</p>
									</div>
									<div class="postSharing">
										<ul>
											<li class="squareButton light ico">
												<a class="icon-link" title="More" href="#">More</a>
											</li>
											<li class="squareButton light ico">
												<a class="icon-eye" title="Views - 63" href="#">63</a>
											</li>
											<li class="squareButton light ico">
												<a class="icon-comment-1" title="Comments - 0" href="#">0</a>
											</li>
											<li class="squareButton light ico likeButton like" data-postid="764" data-likes="0" data-title-like="Like" data-title-dislike="Dislike">
												<a class="icon-heart-1" title="Like - 0" href="#">
													<span class="likePost">0</span>
												</a>
											</li>
										</ul>
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