@extends('front.layouts.master')
@section('content')
<section class="no_padding">
										<div class="container">
											<div class="columnsWrap sc_columns sc_columns_count_3 margin_top_middle margin_bottom_middle">
												<div class="columns2_3 sc_column_item sc_column_item_1 odd first span_2">
													<div class="sc_contact_form sc_contact_form_contact contact_form_1">
														<h1 class="title">Send Us a Message</h1>
													    <form class="contact_1" method="post" action="{{route('contactsSave')}}">
                                                        @csrf
													        <div class="columnsWrap">
																<div class="columns1_3">
																	<label class="required" for="full_name">Name</label>
													                <input type="text" name="full_name" id="full_name">
													            </div>
													            <div class="columns1_3">
													            	<label class="required" for="email">E-mail</label>
													                <input type="text" name="email" id="email">
													            </div>
													          
													        </div>
                                                            <div class="columnsWrap">
                                                            <div class="columns1_3">
													            	<label class="required" for="phone">Phone</label>
													                <input type="text" name="phone" id="phone">
													            </div>
                                                                <div class="columns1_3">
													            	<label class="required" for="subject">Subject</label>
													                <input type="text" name="subject" id="subject">
													            </div>
                                                                </div>
													        <div class="message">
																<div class="">
																	<label class="required" for="message">Your Message</label>
													                <textarea  id="message" class="textAreaSize" name="message"></textarea>
													            </div>
													        </div>
															<div class="sc_contact_form_button">
																<div class="squareButton sc_button_size sc_button_style_global global ico">
																	<button type="submit"  class="contact_form_submit icon-comment-1">Send Message</button>
																</div>
															</div>

													        <div class="result sc_infobox"></div>
													    </form>
													</div> 
												</div>
												
											</div>
										</div>
									</section>
    
@endsection