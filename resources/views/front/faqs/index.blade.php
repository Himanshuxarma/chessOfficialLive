@extends('front.layouts.master')
@section('content')
<!-- ======= Frequently Asked Questions Section ======= -->
<div id="topOfPage" class="topTabsWrap">
    <div class="main">

        <h3 class="pageTitle h3">FAQ</h3>
    </div>
</div>

<div class="mainWrap without_sidebar">
    <div class="main">
        <div class="content">
            <section class="post post_format_standard postAlter page type-page">
                <article class="post_content">
                    <div class="post_text_area">

                        <section class="no_padding">
                            <div class="container">

                                <div class="columnsWrap sc_columns sc_columns_count_3">
                                    <div class="sc_column_item sc_column_item_1 odd first span_2">
                                        <h2 class="sc_title sc_title_regular">Got Questions?</h2>
                                        <p>Equidem laboramus voluptaria vix no, vel nulla disputationi delicatissimi at,
                                            solet dignissim nam in. Simul efficiendi interpretaris eu nec. An graeco
                                            offendit eos, sea an graece platonem democritum. Has nobis eirmod in,
                                            voluptua definiebas eu sea. Possit docendi comprehensam quo ea, quo no
                                            epicurei intellegebat. Essent iriure nec eu.</p>

										<div class="sc_toggles sc_toggles_style_2 sc_show_counter sc_toggles_large">
											@if(!empty($faqs))
											@foreach($faqs as $faq)

											
												<div class="sc_toggles_item   @if($faq->id ==1)sc_active first @endif sc_toggles_item_large odd ">
													<h3 class="sc_toggles_title">
														<span class="sc_items_counter">{{$faq->id}}</span>{{$faq->question}}
													</h3>
													<div class="sc_toggles_content"@if($faq->id==1)style="display:block"@endif>
														<p>{{$faq->answer}}</p>
													</div>
												</div>
											@endforeach
											@endif
											
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
<!-- End Frequently Asked Questions Section -->

@endsection
