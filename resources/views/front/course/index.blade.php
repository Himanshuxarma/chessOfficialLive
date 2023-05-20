@extends('front.layouts.master')
@section('content') 
			<div id="topOfPage" class="topTabsWrap">
				<div class="main">
					<div class="speedBar">
						<a class="home" href="index.html">Home</a>
						<span class="breadcrumbs_delimiter">
							<i class="icon-right-open-mini"></i>
						</span>
						<a class="all" href="#">All Posts</a>
						<span class="breadcrumbs_delimiter">
							<i class="icon-right-open-mini"></i>
						</span>
						<span class="current">Classic (3 columns)</span>
					</div>
					<h3 class="pageTitle h3">Classic (3 columns)</h3>
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
												<a href="#" data-filter="*">All</a>
											</li>
                                            
											<li class="squareButton">
												<a href="#" data-filter=".flt_71">business</a>
											</li>
                                            
											
										</ul>
									</div>
									<section class="masonry isotope" data-columns="3">
                                        @foreach($courses as $data)
										<article class="isotopeElement post_format_standard odd flt_71 flt_66 flt_61">
											<div class="isotopePadding">
												<div class="thumb hoverIncrease" data-image="{{asset('assets/front/images/1317x2000.png')}}" data-title="Summer Childcare Questions">
													<img alt="Summer Childcare Questions" src="{{asset('assets/front/images/1150x647.png')}}">
												</div>
												<h4>
												<a href="#">{{$data->title}}</a>
												</h4>
												<p>Proin dictum tellus magna, id semper elit rhoncus a. Nullam gravida lectus vel nunc sagittis consectetur. Cras dictum, elit sit amet imperdiet posuere, nunc eros cursus tellus, sit amet mollis risus massa vel augue. Nulla sed nunc quis odio facilisis eleifend. Vestibulum feugiat ipsum at interdum fringilla. Donec dictum pharetra velit, eget convallis metus pharetra </p>
												<div class="masonryInfo">
													Posted
													<a href="#" class="post_date">August 29, 2014</a>
												</div>
												<div class="masonryMore">
													<ul>
														<li class="squareButton light ico">
															<a class="icon-link" title="More" href="{{route('courseDetails', $data->id)}}">View Details</a>
														</li>
														<li class="squareButton light ico">
															<a class="icon-eye" title="Views - 142" href="#">Price</a>
														</li>
														<li class="squareButton light ico">
															<a class="icon-comment-1" title="Comments - 0" href="#">Price Per Session</a>
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
																				<a href="#" class="active">1</a>
																			</td>
																			<td>
																				<a href="#">2</a>
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
														<a class="flex-prev" href="#">
														</a>
													</li>
													<li>
														<a class="flex-next" href="#">
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="pager_next ico right squareButton light">
											<a href="#">Next </a>
										</li>
										<li class="pager_last ico right squareButton light">
											<a href="#">Last </a>
										</li>
									</ul>
								</div>

							</div>
						</section>

					</div>
				</div>
			</div>

            @endsection