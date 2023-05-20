@extends('front.layouts.master')
@section('content')
@php 
$countryId = 6;
if(session()->has('SiteCountry')){
$countryId = session()->get('SiteCountry');
}
$countryDetails = App\Helpers\Helper::getCountryData($countryId); 
@endphp
<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="coursses-tab" data-bs-toggle="tab" data-bs-target="#coursses" type="button" role="tab" aria-controls="coursses" aria-selected="true"><img width="48px" src="{{asset('/assets/front/img/coursses.png')}}"> Coursses</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link " id="academy-tab" data-bs-toggle="tab" data-bs-target="#academy" type="button"role="tab" aria-controls="academy" aria-selected="false"><img width="48px"src="{{asset('/assets/front/img/academy.png')}}"> Academy</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active change-text-color2" id="coursses" role="tabpanel" aria-labelledby="coursses-tab">
                <!-- ======= Explore Courses Section ======= -->
                
                <section id="pricing" class="pricing">
                    <div class="container" data-aos="fade-up">
                        @php
                    $ExploreCourses = isset($courseDescription) && !empty($courseDescription->description) ? $courseDescription->description:'';
                    @endphp
                        {!! $ExploreCourses !!}

                        <div class="row">
                           @if(!empty($courses))
                           @foreach($courses as $data)
                                @php $courseFeatured = \Helper::getcourseFeaturedbycourse($data->id); @endphp
                                @php $offers = \Helper::getoffersbycourse($data->id); @endphp
                                @php $priceData =  $data->coursePrice($data->id); @endphp
                                <div class="col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="100">
                                    <div class="box change-border-color2">
                                        <!-- <div class="d-flex justify-content-between coupon">
                                            <h6>Diwali Offers</h6>
                                            <h6>Apply Coupon</h6>
                                        </div> -->
                                        <div class="box-body" style="padding: 30px 20px">
                                            <!-- @if(!empty($offers) && !empty($offers->offer_id))
                                                <div class="box-s-1"><p>{{!empty($offers->offer->title) ? strtoupper(substr($offers->offer->title, 0,4).'...') : 'offerTitle'}} {{$offers->amount}} off</p></div>
                                            @endif -->
                                            <div class="box-s-1"><p>Offer</p></div>
                                            <h3 class="change-text-color3"><strong>{{$data->title}}</strong></h3>
                                            <h4 class="change-text-color2"><sup><strong>{{!empty($priceData) && !empty($priceData->currency) ? $priceData->currency : (!empty($countryDetails) && !empty($countryDetails->currency) ? $countryDetails->currency : '$')}}</strong></sup>{{!empty($priceData) && !empty($priceData->price) ? $priceData->price : 0}}<span class="fright change-text-color2">{{$data->class}} Sessions</span></h4>
                                            @php 
                                            $price = !empty($priceData) && !empty($priceData->price) ? $priceData->price : 0;
                                            $classes = !empty($data) && !empty($data->class) ? $data->class : 0;
                                            $perSessionPrice =  round( (float)$price/$classes) 
                                            @endphp
                                            <p class="sessionprice" >Per Session:<sup> <strong>{{!empty($priceData) && !empty($priceData->currency) ? $priceData->currency : (!empty($countryDetails) && !empty($countryDetails->currency) ? $countryDetails->currency : '$')}}</strong> </sup>{{$perSessionPrice}}  </p>
                                            <ul>
                                                @foreach($courseFeatured as $featured)
                                                <li class="change-text-color2 @if($featured->status==0) na change-text-color2 @endif"><i class="bx bx-check @if($featured->status==0) bx bx-x @endif"></i><span>{{$featured->feature}}</span></li>
                                            @endforeach
                                            </ul>
                                            <a href="{{route('courseDetails', $data->id)}}" class="btn-learn-more fleft learnmore-btn change-text-color2">View Details</a>
                                            <a href="{{url('booking/'.$data->id)}}" class="buy-btn btn-sm fright change-text-color2 change-border-color2">Book Demo</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <p>Courses  Data Not Found</p>
                                @endif

                            
                        </div>

                    </div>
                </section>
                <!-- End Explore Courses Section -->

                <!-- ======= Why chess officialsSection ======= -->
                <section id="why-us" class="why-us section-bg change-background-color">
                    <div class="container-fluid" data-aos="fade-up">

                        <div class="row">

                            <div
                                class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                                <div class="content">
                                    <h3 class="change-text-color2">Why chess officials</h3>
                                    <p class="change-text-color2">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in
                                        reprehenderit
                                    </p>
                                </div>

                                <div class="accordion-list">
                                    <ul>
                                        <li>
                                            <a data-bs-toggle="collapse" class="collapse"
                                                data-bs-target="#accordion-list-1"><span>01</span> Non consectetur a
                                                erat nam at lectus urna duis? <i
                                                    class="bx bx-chevron-down icon-show"></i><i
                                                    class="bx bx-chevron-up icon-close"></i></a>
                                            <div id="accordion-list-1" class="collapse show"
                                                data-bs-parent=".accordion-list">
                                                <p>
                                                    Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id
                                                    volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna
                                                    fringilla urna porttitor rhoncus dolor purus non.
                                                </p>
                                            </div>
                                        </li>

                                        <li>
                                            <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2"
                                                class="collapsed"><span>02</span> Feugiat scelerisque varius morbi enim
                                                nunc? <i class="bx bx-chevron-down icon-show"></i><i
                                                    class="bx bx-chevron-up icon-close"></i></a>
                                            <div id="accordion-list-2" class="collapse"
                                                data-bs-parent=".accordion-list">
                                                <p>
                                                    Dolor sit amet consectetur adipiscing elit pellentesque habitant
                                                    morbi. Id interdum velit laoreet id donec ultrices. Fringilla
                                                    phasellus faucibus scelerisque eleifend donec pretium. Est
                                                    pellentesque elit ullamcorper dignissim. Mauris ultrices eros in
                                                    cursus turpis massa tincidunt dui.
                                                </p>
                                            </div>
                                        </li>

                                        <li>
                                            <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3"
                                                class="collapsed"><span>03</span> Dolor sit amet consectetur adipiscing
                                                elit? <i class="bx bx-chevron-down icon-show"></i><i
                                                    class="bx bx-chevron-up icon-close"></i></a>
                                            <div id="accordion-list-3" class="collapse"
                                                data-bs-parent=".accordion-list">
                                                <p>
                                                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis
                                                    orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra
                                                    diam sit amet nisl suscipit. Rutrum tellus pellentesque eu
                                                    tincidunt. Lectus urna duis convallis convallis tellus. Urna
                                                    molestie at elementum eu facilisis sed odio morbi quis
                                                </p>
                                            </div>
                                        </li>

                                    </ul>
                                </div>

                            </div>

                            <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
                                style='background-image: url("/assets/front/img/why-us.png");' data-aos="zoom-in"
                                data-aos-delay="150">&nbsp;</div>
                        </div>

                    </div>
                </section>
                <!-- End Why chess officials Section -->

                <!-- ======= Arena Master Section ======= -->
                <section class="mt-4 team cta change-background-color">
                    <div class="container" data-aos="fade-up">

                        <div class="section-title">
                            <h2 class="change-text-color1">Meet Your Arena Master</h2>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-content-center" data-aos="zoom-in" data-aos-delay="100">
                                <div class="member d-flex align-items-start">
                                    <div class="pic"><img src="{{asset('/assets/front/img/team/team-3.jpg')}}" class="img-fluid"
                                            alt=""></div>
                                    <div class="member-info">
                                        <h4>Walter White</h4>
                                        <span>Chief Executive Officer</span>
                                        <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                                        <a href="javascript:;" data-toggle="modal" data-target="#modalProfile">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Team Section -->
            </div>
            <div class="tab-pane fade" id="academy" role="tabpanel" aria-labelledby="academy-tab">
                <!-- =======Description of academy Section ======= -->
              
                @php
                $AcademyDescription = isset($academyDescription) && !empty($academyDescription->description) ? $academyDescription->description:'';
                @endphp
                        {!! $AcademyDescription !!}
               
                <!-- End Description of academy Section -->

                <!-- ======= Why chessofficial online academy Section ======= -->
                <section id="why-us" class="why-us section-bg change-background-color">
                    <div class="container-fluid" data-aos="fade-up">

                        <div class="row">

                            <div
                                class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                                <div class="content">
                                    <h3 class="change-text-color1">Why chessofficial online academy</h3>
                                    <p class="change-text-color2">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in
                                        reprehenderit
                                    </p>
                                </div>

                                <div class="accordion-list">
                                    <ul>
                                        <li>
                                            <a data-bs-toggle="collapse" class="collapse"
                                                data-bs-target="#accordion-list-1"><span>01</span> Non consectetur a
                                                erat nam at lectus urna duis? <i
                                                    class="bx bx-chevron-down icon-show"></i><i
                                                    class="bx bx-chevron-up icon-close"></i></a>
                                            <div id="accordion-list-1" class="collapse show"
                                                data-bs-parent=".accordion-list">
                                                <p>
                                                    Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id
                                                    volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna
                                                    fringilla urna porttitor rhoncus dolor purus non.
                                                </p>
                                            </div>
                                        </li>

                                        <li>
                                            <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2"
                                                class="collapsed"><span>02</span> Feugiat scelerisque varius morbi enim
                                                nunc? <i class="bx bx-chevron-down icon-show"></i><i
                                                    class="bx bx-chevron-up icon-close"></i></a>
                                            <div id="accordion-list-2" class="collapse"
                                                data-bs-parent=".accordion-list">
                                                <p>
                                                    Dolor sit amet consectetur adipiscing elit pellentesque habitant
                                                    morbi. Id interdum velit laoreet id donec ultrices. Fringilla
                                                    phasellus faucibus scelerisque eleifend donec pretium. Est
                                                    pellentesque elit ullamcorper dignissim. Mauris ultrices eros in
                                                    cursus turpis massa tincidunt dui.
                                                </p>
                                            </div>
                                        </li>

                                        <li>
                                            <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3"
                                                class="collapsed"><span>03</span> Dolor sit amet consectetur adipiscing
                                                elit? <i class="bx bx-chevron-down icon-show"></i><i
                                                    class="bx bx-chevron-up icon-close"></i></a>
                                            <div id="accordion-list-3" class="collapse"
                                                data-bs-parent=".accordion-list">
                                                <p>
                                                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis
                                                    orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra
                                                    diam sit amet nisl suscipit. Rutrum tellus pellentesque eu
                                                    tincidunt. Lectus urna duis convallis convallis tellus. Urna
                                                    molestie at elementum eu facilisis sed odio morbi quis
                                                </p>
                                            </div>
                                        </li>

                                    </ul>
                                </div>

                            </div>

                            <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
                                style='background-image: url("/assets/front/img/why-us.png");' data-aos="zoom-in"
                                data-aos-delay="150">&nbsp;</div>
                        </div>

                    </div>
                </section>
                <!-- End Why chessofficial online academy Section -->

                <!-- ======= Explore Rates Section ======= -->
                <section id="pricing" class="pricing">
                    <div class="container" data-aos="fade-up">

                        <div class="row">
                           @if(!empty($academy))
                                @foreach($academy as $data)
                                @php $courseFeatured = \Helper::getcourseFeaturedbycourse($data->id); @endphp
                                @php $offers = \Helper::getoffersbycourse($data->id); @endphp
                                @php $priceData =  $data->coursePrice($data->id); @endphp
                                <div class="col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="100">
                                    <div class="box change-border-color2">
                                    <div class="box-body" style="padding: 30px 20px">
                                    <!-- @if(!empty($offers) && !empty($offers->offer_id))
                                                <div class="box-s-1"><p>{{!empty($offers->offer->title) ? strtoupper(substr($offers->offer->title, 4).'...') : 'offerTitle'}} {{$offers->amount}} off</p></div>
                                            @endif -->
                                            <div class="box-s-1"><p>Offer</p></div>
                                        <h3 class="change-text-color3"><strong>{{$data->title}}</strong></h3>
                                        <h4 class="change-text-color2"><sup><strong>{{!empty($priceData) && !empty($priceData->currency) ? $priceData->currency : (!empty($countryDetails) && !empty($countryDetails->currency) ? $countryDetails->currency : '$')}}</strong></sup>{{!empty($priceData) && !empty($priceData->price) ? $priceData->price : 0}}<span class="fright change-text-color2">{{$data->class}} Sessions</span></h4>
                                        @php 
                                            $price = !empty($priceData) && !empty($priceData->price) ? $priceData->price : 0;
                                            $classes = !empty($data) && !empty($data->class) ? $data->class : 0;
                                            $perSessionPrice =  round( (float)$price/$classes) 
                                            @endphp
                                            <p class="sessionprice" >Per Session:<sup> <strong>{{!empty($priceData) && !empty($priceData->currency) ? $priceData->currency : (!empty($countryDetails) && !empty($countryDetails->currency) ? $countryDetails->currency : '$')}}</strong> </sup>{{$perSessionPrice}}  </p>
                                        <ul>
                                        @foreach($courseFeatured as $featured)
                                            <li class="change-text-color2 @if($featured->status==0) na change-text-color2 @endif"><i class="bx bx-check @if($featured->status==0) bx bx-x @endif"></i><span>{{$featured->feature}}</span></li>
                                           @endforeach
                                            
                                        </ul>
                                        <a href="{{route('courseDetails',$data->id)}}" class="btn-learn-more fleft learnmore-btn change-text-color2">View Details</a>
                                        <a href="javascript:void(0);" class="buy-btn btn-sm fright change-text-color1 change-border-color1">Book Demo</a>
                                    </div>
                                </div>
                                </div>
                                @endforeach
                                @else
                                <p>Acedamy Data Not Found</p>
                                @endif

                        </div>
                    </div>
                </section>
                <!-- End Explore Rates Section -->
            </div>
        </div>
    </div>
</section>
<!-- End Portfolio Section -->

<!-- ======= About Us Section ======= -->
@php
$aboutPage = isset($aboutPage) && !empty($aboutPage->description) ? $aboutPage->description : '';
@endphp
{!! $aboutPage !!}
<!-- End About Us Section -->

<!-- ======= Testimonials Section ======= -->
<section id="team" class="team testimonials section-bg change-background-color">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="change-text-color1">Testimonials</h2>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="cslider active"></li>
                        <li data-target="#myCarousel" data-slide-to="1" class="cslider"></li>
                        <li data-target="#myCarousel" data-slide-to="2" class="cslider"></li>
                    </ol>
                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                @foreach($testimonials as $testimonial)
                                <div class="col-sm-6">
                                    <div class="media">
                                        @php $testimonialImg = '/assets/front/img/testimonials.png'; @endphp
                                        @if(file_exists(public_path('/uploads/testimonials/').$testimonial->image))
                                        @php $testimonialImg =
                                        asset('/uploads/testimonials').'/'.$testimonial->image; @endphp
                                        @endif
                                   
                                        <img src="{{$testimonialImg}}" class="mr-3" alt="">
                                        <div class="media-body">
                                            <div class="testimonial">
                                                <p class="change-text-color1">{{ strlen(strip_tags($testimonial->description) < 100 ) ? substr(strip_tags($testimonial->description), 0, 150).' ...' : strip_tags($testimonial->description) }}</p>
                                                <p class="overview change-text-color2"><b class="change-text-color1">{{$testimonial->title}}</b>, Media Analyst</p>
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
    </div>
</section>
<!-- End Team Section -->

<!-- ======= Frequently Asked Questions Section ======= -->
<section id="faq" class="faq">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2 class="change-text-color2">Frequently Asked Questions</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat
                sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="faq-list">
            <ul>
                @if(!empty($faqs))
                @foreach($faqs as $faq)
                <li data-aos="fade-up" data-aos-delay="100">
                    <i class="bx bx-help-circle icon-help change-text-color3"></i> <a data-bs-toggle="collapse" class="collapse"
                        data-bs-target="#faq-list-{{$faq->id}}">{{$faq->question}}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-{{$faq->id}}" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            {{$faq->answer}}
                        </p>
                    </div>
                </li>
                @endforeach
                @else
                <p>Data Not Found</p>
                ]@endif
              </ul>
        </div>

    </div>
</section>
<!-- End Frequently Asked Questions Section -->



@endsection
