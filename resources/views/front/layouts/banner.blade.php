<?php 
	$successMessage = Session::get('success');
	if(isset($successMessage) && !empty($successMessage)){
?>
	<p class="alert alert-success hide">{{ $successMessage }}</p>
<?php
	}
?>
<div id="mainslider_3" class="sliderHomeBullets staticSlider slider_engine_revo slider_alias_revo-babbysitter mainslider_3">
	<div id="rev_slider_3_wrapper" class="rev_slider_wrapper fullwidthbanner-container">
		<div id="rev_slider_3" class="rev_slider fullwidthabanner">
			<ul>
				<li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
					<img src='{{asset("assets/front/images/homebanner.jpg")}}' alt="learnplay-slide-1" data-bgposition="right bottom" data-kenburns="on" data-duration="14000" data-ease="Power1.easeInOut" data-bgfit="100" data-bgfitend="110" data-bgpositionend="center center">
					<div class="tp-caption _lp_slider_title tp-fade skewtorightshort tp-resizeme rs-parallaxlevel-0" data-x="10" data-y="center" data-voffset="-140" data-speed="700" data-start="700" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="words" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
						CHILDREN CHESS ACADEMY
					</div>
					<div class="tp-caption _lp_slider_title tp-fade skewtorightshort tp-resizeme rs-parallaxlevel-0" data-x="10" data-y="center" data-voffset="-90" data-speed="700" data-start="1400" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="words" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
						COURSE BY THE Arena Masters
					</div>
					<div class="tp-caption demo _lp_slider_text tp-fade fadeout tp-resizeme rs-parallaxlevel-0" data-x="10" data-y="center" data-voffset="-50" data-speed="700" data-start="2100" data-easing="Power0.easeIn" data-splitin="none" data-splitout="words" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
						Every chess master happens to be a beginer for once.
					</div>
					<div class="tp-caption _bs_slider_text tp-fade tp-resizeme rs-parallaxlevel-0" data-x="0" data-y="center" data-voffset="50" data-speed="700" data-start="2100" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
						<div class="sc_button sc_button_style_global sc_button_size_huge alignright curveButton squareButton global huge">
							<a href="{{url('booking')}}" class="">Book A Demo</a>
						</div>
					</div>
				</li>
				<li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
					<img src="{{asset("assets/front/images/homebanner2.jpg")}}" alt="learnplay-slide-1" data-bgposition="right bottom" data-kenburns="on" data-duration="14000" data-ease="Power1.easeInOut" data-bgfit="100" data-bgfitend="110" data-bgpositionend="center center"
					>
					<div class="tp-caption _bs_slider_title tp-fade skewtorightshort tp-resizeme rs-parallaxlevel-0" data-x="center" data-hoffset="236" data-y="bottom" data-voffset="-397" data-speed="700" data-start="2000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="words" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">WE ARE MAKING YOUR 
					</div>
					<div class="tp-caption _bs_slider_title tp-fade skewtorightshort tp-resizeme rs-parallaxlevel-0" data-x="center" data-hoffset="180" data-y="bottom" data-voffset="-357" data-speed="700" data-start="2500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="words" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">KIDS SMART.
					</div>
				</li>
				<li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
					<img src="{{asset("assets/front/images/homebanner2.jpg")}}" alt="learnplay-slide-1" data-bgposition="right bottom" data-kenburns="on" data-duration="14000" data-ease="Power1.easeInOut" data-bgfit="100" data-bgfitend="110" data-bgpositionend="center center"
					>
					<div class="banner-content">
						<h1>A TEAM OF FIDE A TEAM OF FIDE A TEAM OF FIDE</h1>
					</div>
					<!-- <div class="tp-caption _bs_slider_title tp-fade skewtorightshort tp-resizeme rs-parallaxlevel-0" data-x="center" data-hoffset="221" data-y="bottom" data-voffset="-410" data-speed="700" data-start="2000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="words" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">A TEAM OF FIDE
					</div> -->
					<!-- <div class="tp-caption _bs_slider_title tp-fade skewtorightshort tp-resizeme rs-parallaxlevel-0" data-x="center" data-hoffset="124" data-y="bottom" data-voffset="-370" data-speed="700" data-start="2500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="words" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">ARENA MASTERS WITH
					</div>
					<div class="tp-caption _bs_slider_text tp-fade tp-resizeme rs-parallaxlevel-0" data-x="center" data-hoffset="190" data-y="bottom" data-voffset="-320" data-speed="700" data-start="3500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.2" data-endelementdelay="0.1" data-endspeed="300">Interactive group sessions and one to one sessions !
					</div> -->
					
				</li>
				<li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
					<img src="{{asset("assets/front/images/homebanner2.jpg")}}" alt="learnplay-slide-1" data-bgposition="right bottom" data-kenburns="on" data-duration="14000" data-ease="Power1.easeInOut" data-bgfit="100" data-bgfitend="110" data-bgpositionend="center center"
					>
					
					<div class="banner-text tp-caption _bs_slider_title tp-fade skewtorightshort tp-resizeme rs-parallaxlevel-0" data-x="center" data-hoffset="-351" data-y="bottom" data-voffset="-415" data-speed="700" data-start="2000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="words" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">EFFECTIVE & EASY LEARNING
					</div>
					<div class="banner-text tp-caption _bs_slider_text_big tp-fade tp-resizeme rs-parallaxlevel-0" data-x="center" data-hoffset="-430" data-y="bottom" data-voffset="-375" data-speed="700" data-start="3500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.2" data-endelementdelay="0.1" data-endspeed="300">With the CHESS MASTERS !
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>