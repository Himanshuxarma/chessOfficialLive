<?php 
	$settings = App\Helpers\Helper::getSettings();
?>
<div class="footerContentWrap">
	<footer class="footerWrap footerStyleLight contactFooterWrap">
		<div class="main contactFooter">
			<section>
			  <div class="other-layouts-footer d-flex align-items-center justify-between row-reverse">
			  		<div class="logo">
						<a href="javascript:void(0);">
							@php
								$footerLOgo = !empty($settings) && !empty($settings->front_logo) ? $settings->front_logo : '';
							@endphp
							<img src="{{asset('assets/front/images/logo.png')}}" alt="logo" />
						</a>
					</div>
					<ul>
						<li>
							<a href="{{route('chess_official_academy')}}" style="color:#FFF;">ChessOfficial Academy</a>
						</li>
						<li>
							<a href="javascrit:void(0);" style="color:#FFF;">ChessOfficial One to One</a>
						</li>
						<li>
							<a href="{{route('terms.conditions')}}">Terms of Use</a>
						</li>
						<li>
							<a href="{{route('privacy.policy')}}">Privacy Policy</a>
						</li>
					</ul>
				
				</div>
			</section>
		</div>
	</footer>
	<div class="copyWrap pb-40">
		<div class="main d-flex align-items-center justify-between">
			<div class="contactShare">
				@php
					$TwitterLink = isset($settings) && !empty($settings->twitter_link) ? $settings->twitter_link:'javascript:void(0);';
					$FBLink = isset($settings) && !empty($settings->facebook_link) ? $settings->facebook_link :'javascript:void(0);';
					$LinkedinLink = isset($settings) && !empty($settings->linkedin_link) ? $settings->linkedin_link:'javascript:void(0);';
					$InstagramLink = isset($settings) && !empty($settings->instagram_link) ? $settings->instagram_link:'javascript:void(0);';
					$GoogleLink = isset($settings) && !empty($settings->google_link) ? $settings->google_link:'javascript:void(0);';
				@endphp
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
			<div class="copyright">
				<a href="javascript:void(0);">ChessOfficial</a> &copy; 2023 All Rights Reserved
				<a href="{{route('terms.conditions')}}">Terms of Use</a>
				and <a href="{{route('privacy.policy')}}">Privacy Policy</a>
			</div>
		
		</div>
	</div>
		
	<div class="chat_us">
		<div class="chat_img">
		<img src="{{asset('assets/front/images/whatsapp.png')}}" height="20px"> 
		</div>
		<div class="chat_text">
		<a href="https://wa.me/{{!empty($settings->whatsapp_no)  ? $settings->whatsapp_no : '+91 8005517323'}}"><span>Chat with us</span></a>
		</div>
	</div>
</div>