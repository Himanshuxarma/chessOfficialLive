@extends('front.layouts.master')
@section('content')
<div class="widgetTabs">
				<div id="topOfPage" class="topTabsWrap">
					<div class="main">
						<div class="speedBar">
							<a class="home" href="index.html">Home</a>
							<span class="breadcrumbs_delimiter">
								<i class="icon-right-open-mini"></i>
							</span>
							<a class="all" href="#">All Posts</a>
						</div>
						<h3 class="pageTitle h3">{{$courses->title}}</h3>
						<div class="tabsButton">
							<ul class="" role="tablist">
								<li class="" role="tab">
									<a href="#tabBlog">
										<span>Blog</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>	


				<div class="mainWrap without_sidebar">
					<div class="main">
						<div class="content">

							<aside id="tabBlog" class="blogContent">
								<article class="post_format_standard postCenter hrShadow odd post">
									<div class="post_info infoPost">
										Posted
										<a href="#" class="post_date">July 21, 2014</a>
										<span class="separator">|</span>
										by
										<a href="#" class="post_author">admin</a>
										<span class="separator">|</span>
										<span class="post_cats">
											in
											<a class="cat_link" href="#">Post formats fullwidth</a>
										</span>
									</div>
									<h2 class="post_title">
									<a href="javascript:void(0);">{{$courses->title}}</a>
									</h2>
									<div class="sc_section columns1_2 post_thumb thumb">
										<a href="javascript:void(0);">
                                        @php $courseImg = '/assets/front/img/default_product.png'; @endphp
                                        @if(file_exists(public_path('/uploads/course/').$courses->image))
                                        @php $courseImg = asset('/uploads/course').'/'.$courses->image; @endphp
                                        @endif
											<img alt="Babysitter and Nanny Hiring Resources" src="{{$courseImg}}">
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
                                @if(!empty($curriculum))
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
                                <p> Course Curriculum Data Not Found</p>
                                @endif
							</aside>
							<aside id="archives-6" class="widgetTop widget widget_archive">
								<h3 class="titleHide title">Archives</h3>
								<ul>
									<li>
										<a href='#'>September 2014</a>&nbsp;(16)
									</li>
									<li>
										<a href='#'>August 2014</a>&nbsp;(29)
									</li>
									<li>
										<a href='#'>July 2014</a>&nbsp;(14)
									</li>
									<li>
										<a href='#'>June 2014</a>&nbsp;(35)
									</li>
									<li>
										<a href='#'>May 2014</a>&nbsp;(4)
									</li>
									<li>
										<a href='#'>April 2014</a>&nbsp;(2)
									</li>
								</ul>
							</aside>
							<aside id="calendar-5" class="widgetTop clr widget_calendar">
								<h3 class="titleHide title">Calendar</h3>
								<div id="calendar_wrap">
									<table class="sc_calendar">
										<caption>December 2015</caption>
										<thead>
											<tr>
												<th scope="col" title="Monday">M</th>
												<th scope="col" title="Tuesday">T</th>
												<th scope="col" title="Wednesday">W</th>
												<th scope="col" title="Thursday">T</th>
												<th scope="col" title="Friday">F</th>
												<th scope="col" title="Saturday">S</th>
												<th scope="col" title="Sunday">S</th>
											</tr>
										</thead>
										<tfoot>
										<tr>
											<td colspan="3" class="prev">
												<a href="#">&laquo; Nov</a>
											</td>
											<td class="pad">&nbsp;</td>
											<td colspan="3" class="next">&nbsp;</td>
										</tr>
										</tfoot>
										<tbody>
											<tr>
												<td colspan="1" class="pad">&nbsp;</td>
												<td>1</td>
												<td>2</td>
												<td>3</td>
												<td>4</td>
												<td>5</td>
												<td>6</td>
											</tr>
											<tr>
												<td>7</td>
												<td>8</td>
												<td>9</td>
												<td>10</td>
												<td>11</td>
												<td>12</td>
												<td>13</td>
											</tr>
											<tr>
												<td>14</td>
												<td id="today">15</td>
												<td>16</td>
												<td>17</td>
												<td>18</td>
												<td>19</td>
												<td>20</td>
											</tr>
											<tr>
												<td>21</td>
												<td>22</td>
												<td>23</td>
												<td>24</td>
												<td>25</td>
												<td>26</td>
												<td>27</td>
											</tr>
											<tr>
												<td>28</td>
												<td>29</td>
												<td>30</td>
												<td>31</td>
												<td class="pad" colspan="3">&nbsp;</td>
											</tr>
										</tbody>
									</table>
								</div>
							</aside>
							<aside id="categories-4" class="widgetTop clr widget widget_categories">
								<h3 class="titleHide title">Categories</h3>
								<ul>
									<li class="cat-item">
										<a href="#">Masonry (2 columns)</a> (16)
										<ul class='children'>
											<li class="cat-item">
												<a href="#">2 columns with sidebar</a> (16)
												<ul class='children'>
													<li class="cat-item">
														<a href="#">3 columns</a> (16)
														<ul class='children'>
															<li class="cat-item">
																<a href="#">3 columns with sidebar</a> (16)
																<ul class='children'>
																	<li class="cat-item">
																		<a href="#">4 columns</a> (16)
																		<ul class='children'>
																			<li class="cat-item">
																				<a href="#">Tabs demo</a> (16)
																				<ul class='children'>
																					<li class="cat-item">
																						<a href="#">Timeline example</a> (16)
																					</li>
																				</ul>
																			</li>
																		</ul>
																	</li>
																</ul>
															</li>
														</ul>
													</li>
												</ul>
											</li>
										</ul>
									</li>
									<li class="cat-item">
										<a href="#">Portfolio</a> (18)
										<ul class='children'>
											<li class="cat-item">
												<a href="#">Classic (1 column)</a> (17)
												<ul class='children'>
													<li class="cat-item">
														<a href="#">2 columns</a> (17)
														<ul class='children'>
															<li class="cat-item">
																<a href="#">2 columns with sidebar</a> (17)
																<ul class='children'>
																	<li class="cat-item">
																		<a href="#">3 columns</a> (17)
																		<ul class='children'>
																			<li class="cat-item">
																				<a href="#">3 columns with sidebar</a> (17)
																				<ul class='children'>
																					<li class="cat-item">
																						<a href="#">Classic (4 columns)</a> (17)
																					</li>
																				</ul>
																			</li>
																		</ul>
																	</li>
																</ul>
															</li>
														</ul>
													</li>
												</ul>
											</li>
											<li class="cat-item">
												<a href="#">Grid (2 columns)</a> (18)
												<ul class='children'>
													<li class="cat-item">
														<a href="#">2 columns with sidebar</a> (18)
														<ul class='children'>
															<li class="cat-item">
																<a href="#">3 columns</a> (18)
																<ul class='children'>
																	<li class="cat-item">
																		<a href="#">3 columns with sidebar</a> (18)
																		<ul class='children'>
																			<li class="cat-item">
																				<a href="#">Grid (4 columns</a> (18)
																			</li>
																		</ul>
																	</li>
																</ul>
															</li>
														</ul>
													</li>
												</ul>
											</li>
											<li class="cat-item">
												<a href="#">Masonry (2 columns)</a> (18)
												<ul class='children'>
													<li class="cat-item">
														<a href="#">2 columns with sidebar</a> (18)
														<ul class='children'>
															<li class="cat-item">
																<a href="#">3 columns</a> (18)
																<ul class='children'>
																	<li class="cat-item">
																		<a href="#">3 columns with sidebar</a> (18)
																		<ul class='children'>
																			<li class="cat-item">
																				<a href="#">Masonry (4 columns)</a> (18)
																			</li>
																		</ul>
																	</li>
																</ul>
															</li>
														</ul>
													</li>
												</ul>
											</li>
										</ul>
									</li>
									<li class="cat-item">
										<a href="#">Post formats &amp; All widgets</a> (12)
										<ul class='children'>
											<li class="cat-item">
												<a href="#">Post formats fullwidth</a> (12)
											</li>
										</ul>
									</li>
									<li class="cat-item">
										<a href="#">Posts slider</a> (6)
									</li>
									<li class="cat-item">
										<a href="#">Skin KidsCare</a> (15)
									</li>
								</ul>
							</aside>
							<aside id="meta-4" class="widgetTop clr widget widget_meta">
								<h3 class="titleHide title">Meta</h3>
								<ul>
									<li>
										<a href="#">Entries RSS</a>
									</li>
									<li>
										<a href="#">Comments RSS
										</a>
									</li>
								</ul>
							</aside>
							<aside id="pages-3" class="widgetTop clr widget widget_pages">
								<h3 class="titleHide title">Pages</h3>
								<ul>
									<li class="page_item">
										<a href="#">About Us</a>
									</li>
									<li class="page_item">
										<a href="#">Blog streampage</a>
									</li>
									<li class="page_item">
										<a href="#">Booking Calendar</a>
									</li>
									<li class="page_item">
										<a href="#">Cart</a>
									</li>
									<li class="page_item">
										<a href="#">Checkout</a>
									</li>
									<li class="page_item">
										<a href="#">Contact Us</a>
									</li>
									<li class="page_item">
										<a href="#">Donation</a>
									</li>
									<li class="page_item">
										<a href="#">FAQ</a>
									</li>
									<li class="page_item">
										<a href="#">Featured Products</a>
									</li>
									<li class="page_item">
										<a href="#">Homepage (Babysitter)</a>
									</li>
									<li class="page_item">
										<a href="#">Homepage (Babysitter) Central menu</a>
									</li>
									<li class="page_item">
										<a href="#">Homepage (Babysitter) Standard</a>
									</li>
									<li class="page_item">
										<a href="#">Homepage (Babysitter) Transparent</a>
									</li>
									<li class="page_item page-item-2202">
										<a href="#">Homepage (Health Care)</a>
									</li>
									<li class="page_item page-item-2443">
										<a href="#">Homepage (Learn &#038; Play)</a>
									</li>
									<li class="page_item page-item-1131">
										<a href="#">Homepage (Toys Store)</a>
									</li>
									<li class="page_item page-item-2415">
										<a href="#">Homepage with Video Background (Babysitter)</a>
									</li>
									<li class="page_item page-item-7">
										<a href="#">My Account</a>
									</li>
									<li class="page_item page-item-1094">
										<a href="#">Page 404</a>
									</li>
									<li class="page_item page-item-1008">
										<a href="#">Portfolio Hover styles (Circle)</a>
									</li>
									<li class="page_item page-item-1014">
										<a href="#">Portfolio Hover styles (Square)</a>
									</li>
									<li class="page_item page-item-1106">
										<a href="#">Posts Slider</a>
									</li>
									<li class="page_item page-item-1120">
										<a href="#">Posts Slider Fullscreen</a>
									</li>
									<li class="page_item page-item-1086">
										<a href="#">Pricing Tables</a>
									</li>
									<li class="page_item page-item-1097">
										<a href="#">Search results</a>
									</li>
									<li class="page_item page-item-1868">
										<a href="#">Tribe Events Template</a>
									</li>
									<li class="page_item page-item-760">
										<a href="#">Typography</a>
									</li>
									<li class="page_item page-item-1099">
										<a href="#">Under Constraction</a>
									</li>
								</ul>
							</aside>
							<aside id="recent-comments-4" class="widgetTop clr widget-number-7 widget widget_recent_comments">
								<h3 class="titleHide title">Recent comments</h3>
								<ul id="recentcomments">
									<li class="recentcomments">
										<span class="comment-author-link">John Doe</span>
										on
										<a href="#">Little Known on How to Best Help Kids After Trauma</a>
									</li>
									<li class="recentcomments">
										<span class="comment-author-link">John Doe</span>
										on
										<a href="#">Babysitter and Nanny Hiring Resources</a>
									</li>
									<li class="recentcomments">
										<span class="comment-author-link">John Doe</span>
										on
										<a href="#">Quote post</a>
									</li>
									<li class="recentcomments">
										<span class="comment-author-link">Miki Williams</span>
										on
										<a href="#">Link post</a>
									</li>
									<li class="recentcomments">
										<span class="comment-author-link">Miki Williams</span>
										on
										<a href="#">Theme Slider instead of WP Gallery</a>
									</li>
								</ul>
							</aside>
							<aside id="recent-posts-4" class="widgetTop clr widget-number-8 widget widget_recent_entries">
								<h3 class="titleHide title">Recent posts</h3>
								<ul>
									<li>
										<a href="#">How to Teach Children to Think for Themselves</a>
										<span class="post-date">September 15, 2014</span>
									</li>
									<li>
										<a href="#">How to Keep Your Kids Healthy at School</a>
										<span class="post-date">September 14, 2014</span>
									</li>
									<li>
										<a href="#">Negotiating With A Kid</a>
										<span class="post-date">September 13, 2014</span>
									</li>
									<li>
										<a href="#">Sharing the Chores at Home</a>
										<span class="post-date">September 10, 2014</span>
									</li>
									<li>
										<a href="#">Kids and TV- Effects of Television on Children</a>
										<span class="post-date">September 9, 2014</span>
									</li>
								</ul>
							</aside>
							<aside id="rss-4" class="widgetTop clr widget-number-9 widget widget_rss">
								<h3 class="titleHide title">
								<a class='rsswidget' href='#'>
									<img src='{{asset("assets/front/images/rss.png")}}' alt='RSS'/>
								</a>
								<a class='rsswidget' href='#'>RSS</a>
								</h3>
								<ul>
									<li>
										<a class='rsswidget' href='#'>Hedge fund manager covers short bet against Lumber Liquidators</a>
										<span class="rss-date">December 15, 2015</span>
										<div class="rssSummary">BOSTON (Reuters) - Hedge fund manager Whitney Tilson, who had accused flooring retailer Lumber Liquidators Holdings Inc of selling flooring laced with cancer causing materials and bet the stock price...</div>
									</li>
									<li>
										<a class='rsswidget' href='#'>Billionaire Lasry backs junk bond fund hit with heavy redemptions</a>
										<span class="rss-date">December 15, 2015</span>
										<div class="rssSummary">BOSTON (Reuters) - Billionaire hedge fund manager Marc Lasry on Monday backed a junk bond mutual fund hemorrhaging assets at his Avenue Capital Group as jittery investors exit high-yield bonds amid a...</div>
									</li>
								</ul>
							</aside>
							<aside id="search-3" class="widgetTop clr widget widget_search">
								<h3 class="titleHide title">Search</h3>
								<form method="get" class="search-form" action="http://kidscare.axiomthemes.com/">
									<input type="text" class="search-field" placeholder="Search &hellip;" value="" name="s" title="Search for:"/>
									<span class="search-button squareButton light ico">
										<a class="search-field icon-search" href="#">
										</a>
									</span>
								</form>
							</aside>
							<aside id="ag_cloud-3" class="widgetTop clr widget widget_tag_cloud">
								<h3 class="titleHide title">Tags</h3>
								<div class="tagcloud">
									<a href='#' title='1 topic'>aside post</a>
									<a href='#' title='1 topic'>audio post</a>
									<a href='#' title='3 topics'>business</a>
									<a href='#' title='1 topic'>chat post</a>
									<a href='#' title='1 topic'>clear</a>
									<a href='#' title='4 topics'>creative</a>
									<a href='#' title='4 topics'>design</a>
									<a href='#' title='1 topic'>events</a>
									<a href='#' title='2 topics'>health</a>
									<a href='#' title='4 topics'>holidays</a>
									<a href='#' title='16 topics'>kidscare</a>
									<a href='#' title='1 topic'>link post</a>
									<a href='#' title='1 topic'>music</a>
									<a href='#' title='6 topics'>nature</a>
									<a href='#' title='12 topics'>post formats</a>
									<a href='#' title='6 topics'>posts slider</a>
									<a href='#' title='1 topic'>print</a>
									<a href='#' title='1 topic'>quote post</a>
									<a href='#' title='31 topics'>shortcodes</a>
									<a href='#' title='1 topic'>status post</a>
									<a href='#' title='2 topics'>toys</a>
									<a href='#' title='2 topics'>typography</a>
									<a href='#' title='1 topic'>video post</a>
									<a href='#' title='3 topics'>gallery</a>
								</div>
							</aside>
							<aside id="text-6" class="widgetTop clr widget widget_text">
								<h3 class="titleHide title">Custom text</h3>
								<div class="textwidget">
									<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
								</div>
							</aside>

						</div>
					</div>
				</div>
			</div>
            
@endsection