<?php 
	$settings = App\Helpers\Helper::getSettings();
?>
<div class="footerContentWrap">
				<footer class="footerWrap footerStyleLight contactFooterWrap">
					<div class="main contactFooter">
						<section>
							<div class="logo">
								<a href="javascript:void(0);">
									<img src="{{asset('assets/front/images/245x43.png')}}" alt="">
								</a>
							</div>
							<div class="contactAddress">
								<address class="addressRight">
									Phone: {{$settings->phone1}}<br>
									Fax: 1.800.123.4566 
								</address>
								<address class="addressLeft">
									{{$settings->address}}<br> 
								</address>
							</div>
							<div class="contactTtextLine">Share this page with friends who need help in 2015, too.</div>
							<div class="contactShare">
							@php
								$TwitterLink = isset($settings) && !empty($settings->twitter_link) ? $settings->twitter_link:'javascript:void(0);';
								$FBLink = isset($settings) && !empty($settings->facebook_link) ? $settings->facebook_link :'javascript:void(0);';
								$LinkedinLink = isset($settings) && !empty($settings->linkedin_link) ? $settings->linkedin_link:'javascript:void(0);';
								$InstagramLink = isset($settings) && !empty($settings->instagram_link) ? $settings->instagram_link:'javascript:void(0);';
								$GoogleLink = isset($settings) && !empty($settings->google_link) ? $settings->google_link:'javascript:void(0);';
							@endphp
								<ul>
									<li>
										<a class="social_icons fShare facebook_image" href="{{$FBLink}}" target="_blank" title="facebook">
											<span></span>
										</a>
									</li>
									<li>
										<a class="social_icons fShare pinterest_image" href="http://pinterest.com" target="_blank" title="Pinterest">
											<span></span>
										</a>
									</li>
									<li>
										<a class="social_icons fShare twitter_image" href="{{$TwitterLink}}" target="_blank" title="twitter">
											<span></span>
										</a>
									</li>
									<li>
										<a class="social_icons fShare gplus_image" href="{{$GoogleLink}}" target="_blank" title="gplus">
											<span></span>
										</a>
									</li>
									<li>
										<a class="social_icons fShare linkedin_image" href="{{$LinkedinLink}}" target="_blank" title="Linkedin">
											<span></span>
										</a>
									</li>
									<li>
										<a class="social_icons fShare vimeo_image" href="http://vimeo.com" target="_blank" title="Vimeo">
											<span></span>
										</a>
									</li>
									<!-- <li>
										<a class="social_icons fShare whatsapp_image" href="http://vimeo.com" target="_blank" title="Whatsapp">
											<span></span>
										</a>
									</li> -->
								</ul>
							</div>
						</section>
					</div>
				</footer>

				<div class="copyWrap">
					<div class="copy main">
						<div class="copyright">
							<a href="javascript:void(0);">ChessOfficial</a> &copy; 2023 All Rights Reserved
							<a href="{{route('terms.conditions')}}">Terms of Use</a>
							and <a href="{{route('privacy.policy')}}">Privacy Policy</a>
						</div>
						<div class="copy_socials socPage">
							<ul>
								<li>
									<a class="social_icons social_facebook facebook_image" target="_blank" href="http://facebook.com">
										<span></span>
									</a>
								</li>
								<li>
									<a class="social_icons social_pinterest pinterest_image" target="_blank" href="http://pinterest.com">
										<span></span>
									</a>
								</li>
								<li>
									<a class="social_icons social_twitter twitter_image" target="_blank" href="http://twitter.com">
										<span></span>
									</a>
								</li>
								<li>
									<a class="social_icons social_gplus gplus_image" target="_blank" href="http://gplus.com">
										<span></span>
									</a>
								</li>
								<li>
									<a class="social_icons social_linkedin linkedin_image" target="_blank" href="http://linkedin.com">
										<span></span>
									</a>
								</li>
								<li>
									<a class="social_icons social_vimeo vimeo_image" target="_blank" href="http://vimeo.com">
										<span></span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>