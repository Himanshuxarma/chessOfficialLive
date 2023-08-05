@extends('front.layouts.master')
@section('customstyle')

@endsection
@section('content')
<!-- <?php
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
                                            @if(!empty($testimonialsDetails->image))
                                            @php $testimonialsImg =
                                            asset('/uploads/testimonials').'/'.$testimonialsDetails->image; @endphp
                                            @else
                                            @php $testimonialsImg = '/assets/front/images/300*300.jpg'; @endphp
                                            @endif
                                            <img src="{{$testimonialsImg}}" alt="" style="width:300px;height:300px">
                                            <div class="">

                                                @if((!empty($testimonialsDetails->CountryID) &&
                                                $testimonialsDetails->CountryID->country_flag !=
                                                '') ? $testimonialsDetails->CountryID->country_flag : 'N/A')
                                                @php $country_flag =
                                                asset('/uploads/country').'/'.$testimonialsDetails->CountryID->country_flag;
                                                @endphp
                                                @else
                                                @php $country_flag = '/assets/front/images/300*300.jpg'; @endphp
                                                @endif
                                                <img alt="" src="{{$country_flag}}" style="width:10%">
                                            </div>
                                            <h3 class="sc_team_item_title ">{{$testimonialsDetails->title}}</h3>
                                            <div class="sc_team_item_position ">
                                                {{ strlen(strip_tags($testimonialsDetails->description)) > 50  ? substr(strip_tags($testimonialsDetails->description), 0, 2000).' ...' : strip_tags($testimonialsDetails->description) }}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class=" testimonial_form">
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
</div> -->

<h1>COMING SOON </h1>
@endsection
