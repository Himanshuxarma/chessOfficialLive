<?php 
	$successMessage = Session::get('success');
	if(isset($successMessage) && !empty($successMessage)){
?>
	<p class="alert alert-success hide">{{ $successMessage }}</p>
<?php
	}
?>
<div class="owl-carousel hero-slider owl-theme">
    <div class="item">
         <img src='{{asset("assets/front/images/homebanner1.jpg")}}' alt="learnplay-slide-1">
         <div class="main">
          <div class="slider-content">
              <div class="heading-sec">Chessofficial world chess school by Fide Arena Masters</div>
              <div class="short-description">Every chess master happens to be a beginer for once.</div>
              <div class="button-sec sc_button sc_button_style_light sc_button_size_huge squareButton light huge"><a href="{{url('booking')}}" class="">Book A Demo</a></div>
          </div>
        </div>
      </div>
      <div class="item">
         <img src='{{asset("assets/front/images/homebanner2.jpg")}}' alt="learnplay-slide-1">
         <div class="main">
          <div class="slider-content">
              <div class="heading-sec">Chessofficial world chess school by Fide Arena Masters</div>
              <div class="short-description">Every chess master happens to be a beginer for once.</div>
              <div class="button-sec sc_button sc_button_style_light sc_button_size_huge squareButton light huge"><a href="{{url('booking')}}" class="">Book A Demo</a></div>
          </div>
        </div>
      </div>
      <div class="item">
         <img src='{{asset("assets/front/images/homebanner3.jpg")}}' alt="learnplay-slide-1">
         <div class="main">
          <div class="slider-content">
              <div class="heading-sec">Chessofficial world chess school by Fide Arena Masters</div>
              <div class="short-description">Every chess master happens to be a beginer for once.</div>
              <div class="button-sec sc_button sc_button_style_light sc_button_size_huge squareButton light huge"><a href="{{url('booking')}}" class="">Book A Demo</a></div>
          </div>
        </div>
      </div>
</div>