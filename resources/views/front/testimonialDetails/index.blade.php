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
<div id="topOfPage" class="topTabsWrap">
	<div class="main">
		<div class="speedBar">
			<a class="home" href="javascript:void(0);">Home</a>
			<span class="breadcrumbs_delimiter">
				<i class="icon-right-open-mini"></i>
			</span>
			<a class="all" href="javascript:void(0);">Testimonial Details</a>
			<span class="breadcrumbs_delimiter">
				<i class="icon-right-open-mini"></i>
			</span>
			<span class="current">Testimonial</span>
		</div>
		<h3 class="pageTitle h3">Testimonial</h3>
	</div>
</div>
<div class="mainWrap without_sidebar">
    <div class="content">
        <div class="">
            <section class="post post_format_standard postAlter no_margin page type-page">
                <article class="post_content">
                    <div class="post_text_area">
                        <section class="">
                            <div class="container main">
                                <div class="form-container sc_columns p-0">
                                    <div class="sc_column_item">
                                        <div class="user-dashboard sc_contact_form sc_contact_form_contact">
                                           <div class="d-flex flex-wrap"> 
                                                <div class="img-sec mr-20">
                                                @if(!empty($testimonialsDetails->image))
                                                    @php $testimonialsImg =
                                                    asset('/uploads/testimonials').'/'.$testimonialsDetails->image; @endphp
                                                    @else
                                                    @php $testimonialsImg = '/assets/front/images/300*300.jpg'; @endphp
                                                    @endif
                                                    <img src="{{$testimonialsImg}}" alt="" style="width:300px;height:300px">
                                                </div>
                                                <div class="right-sec">
                                                    <div class="flag-img">
                                                        <?php
                                                        if(!empty($testimonialsDetails->country_id) && !empty($testimonialsDetails->CountryID) && !empty($testimonialsDetails->CountryID->country_flag)){
                                                            $country_flag = asset('/uploads/country').'/'.$testimonialsDetails->CountryID->country_flag;
                                                        } else {
                                                            $country_flag = '/assets/front/images/300*300.jpg';
                                                        }
                                                        ?>
                                                        <img alt="" src="{{$country_flag}}" style="width:10%">
                                                    </div>
                                                    <h3 class="sc_team_item_title ">{{$testimonialsDetails->title}}</h3>
                                                    <div class="user-detail">{{$testimonialsDetails->created_at->format('d/m/Y/h:i:s A')}}</div>
                                                </div>
                                            </div>
                                            <div class="sc_team_item_position ">
                                                {{ strlen(strip_tags($testimonialsDetails->description)) > 50  ? substr(strip_tags($testimonialsDetails->description), 0, 2000).' ...' : strip_tags($testimonialsDetails->description) }}
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
                                                        <div class="sc_team_item">
                                                            <div class="sc_team_item_avatar">
                                                                <?php 
                                                                if(!empty($data->image)){
                                                                    $testimonialsImg = asset('/uploads/testimonials').'/'.$data->image;
                                                                } else {
                                                                    $testimonialsImg = '/assets/front/images/300*300.jpg';
                                                                }
                                                                ?>
                                                                <img alt="" src="{{$testimonialsImg}}">
                                                            </div>
                                                            <div class="sc_team_item_info">
                                                                <div class="testi_country_flag_img">
                                                                    <?php
                                                                    if((!empty($data->country_id) && !empty($data->CountryID) && !empty($data->CountryID->country_flag))){
                                                                        $country_flag = asset('/uploads/country').'/'.$data->CountryID->country_flag;
                                                                    } else {
                                                                        $country_flag = '/assets/front/images/300*300.jpg';
                                                                    }
                                                                    ?>
                                                                    <img alt="" src="{{$country_flag}}" style="width:10%">
                                                                </div>
                                                                <h3 class="sc_team_item_title mytitle">
																	<a href="{{route('testimonialDetails',$data->id)}}">{{$data->title}}</a>
                                                                </h3>
                                                                <?php $description = strip_tags($data->description); ?>
                                                                <div class="sc_team_item_position theme_accent2">
                                                                    <?php echo strlen($description) > 100  ? substr($description, 0, 100).' ...' : $description; ?>
                                                                </div>
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
                                            <form class="contact_1" method="post" action="{{route('reviewSave')}}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="columnsWrap">
                                                    <div class="columns1_2">
                                                        <label class="required"
                                                            for="title"><strong>Name</strong></label>
                                                        <input type="text" name="title" id="title"
                                                            value="{{old('title')}}">
                                                        @if ($errors->has('title'))
                                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="columns1_2">
                                                        <label class="required" for="country_id"><strong>
                                                                Country</strong></label>
                                                        <select id="country_id" class="form-control" name="country_id">
                                                            <option value="">--Select Country--</option>
                                                            @foreach($country as $data)
                                                                <option value="{{$data->id}}">{{ $data->country }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('country_id'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('country_id') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="columnsWrap">
                                                    <div class="columns1_2">
                                                        <label class="required"
                                                            for="image"><strong>Image</strong></label>
                                                        <input type="file" name="image" id="image">
                                                        @if ($errors->has('image'))
                                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="message">
                                                    <div class="">
                                                        <label class="required" for="description"><strong>Your
                                                                Review</strong></label>
                                                        <textarea id="description" class="textAreaSize"
                                                            name="description">{{old('description')}}</textarea>
                                                        @if ($errors->has('description'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('description') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="message">
                                                    <div class="">
                                                        <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                                                        @if ($errors->has('g-recaptcha-response'))
                                                            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="sc_contact_form_button">
                                                    <div
                                                        class="squareButton sc_button_size sc_button_style_global global ico">
                                                        <button type="submit"
                                                            class="contact_form_submit icon-comment-1">Post
                                                            Review</button>
                                                    </div>
                                                </div>
                                            </form>
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
@section('customscript')
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
