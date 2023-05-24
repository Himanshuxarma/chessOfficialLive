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
                                <img class="course-details-page" alt="Babysitter and Nanny Hiring Resources" src="{{$courseImg}}">
                            </a>
                        </div>
                        <div class="postStandard">
                            <p>{{$courses->description}} </p>
                        </div>
                        <div class="course_detail_button">
                            <ul>
                                <li class="squareButton light ico ">
                                    <a href="javascript:void(0);"> {{$courses->class}} Session</a>
                                </li>
                                <li class="squareButton light ico">
                                    <a class="icon-eye" title="Views - 198"
                                        href="javascript:void(0);">{{$courses->price}} Price</a>
                                </li>
                                <li class="squareButton light ico">
                                    <a class="icon-comment-1" title="Comments - 1"
                                        href="javascript:void(0);">{{$courses->age}} Age</a>
                                </li>
                                <li class="squareButton light ico">
                                    <a class="icon-comment-1" title="Comments - 1"
                                        href="javascript:void(0);">{{$courses->batch}} Batch</a>
                                </li>
                                <li class="squareButton light ico">
                                    <a class="icon-comment-1" title="Comments - 1"
                                        href="javascript:void(0);">{{$courses->hrs_training}} Hrs Training</a>
                                </li>
                                <li class="squareButton light ico">
                                    <a class="icon-comment-1" title="Comments - 1"
                                        href="javascript:void(0);">{{$courses->format}} Format</a>
                                </li>
                                <li class="squareButton light ico">
                                    <a class="icon-comment-1" title="Comments - 1"
                                        href="javascript:void(0);">{{$courses->duration}} Duration</a>
                                </li>
								
                            </ul>
							<div class="booking_demo">
								<div class="booking-demo-1">
									<ul>
									<li class="squareButton light ico ">
                                    <a href="#">Book A Demo</a>
                                </li>
								<li class="squareButton light ico ">
								<a href="#">Buy A Course</a>
                                </li>
								</ul>
								
									
								</div>
							 </div>
						
                    </article>

                    @if (!empty($curriculum))
                    @foreach($curriculum as $key=> $data)

                    <article class="post_format_standard  hrShadow  post @if($key % 2 == 0)postRight even @endif postLeft  odd">

                        <div class="sc_section  columns1_2  @if($key % 2 == 0)sc_alignright  @endif sc_alignleft"> 
                            <div class="">
                                <div class="sc_zoom course_curriculum">
								@if(!empty($data->image))
                                	@php $curriculumImg = asset('/uploads/course_curriculum').'/'.$data->image; @endphp
                                @else
                                	@php $curriculumImg = '/assets/front/images/415x310.png'; @endphp
                                @endif
                                    <img src="{{$curriculumImg}}" data-zoom-image="images/900x600.png" alt="" />
                                </div>
                            </div>
                        </div>
                        <h2 class="post_title">
                            <a href="javascript:void(0);">{{$data->title}}</a>
                        </h2>
                        <div class="postStandard">
                            <p>{{$data->description}}</p>
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
