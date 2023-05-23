@extends('front.layouts.master')
@section('content')
<section class="no_padding">

    <div class="container">
        <div class="columnsWrap sc_columns sc_columns_count_3 margin_top_middle margin_bottom_middle">
            <div class=" sc_column_item sc_column_item_1 odd first span_2">
                <div class="sc_contact_form sc_contact_form_contact contact_form_1">
                    <h2 class="title">Address</h2>
                    <form class="contact_1" method="post" action="include/contact-form.php">
                        
                    <div class="row mt-4">
                             <div class="col-75">
                        <div class="columnsWrap">
                            
                            <div class="columns1_3">
                                <label class="required" for="contact_form_username">Country</label>
                                <input type="text" name="name" id="contact_form_username">
                            </div>
                            <div class="columns1_3">
                                <label class="required" for="contact_form_username">TimeZone</label>
                                <input type="text" name="name" id="contact_form_username">
                            </div>
                           
                        </div>
                        </div>
                        </div>

                        <div class="result sc_infobox"></div>
                    </form>
                </div>
                <div class="sc_contact_form sc_contact_form_contact contact_form_1">
                    <h2 class="title">Booking Info</h2>
                    <form class="contact_1" method="post" action="include/contact-form.php">
                        
                    <div class="row mt-4">
                             <div class="col-75">
                        <div class="columnsWrap">
                            
                            <div class="columns1_3">
                                <label class="required" for="contact_form_username">Date Of Demo</label>
                                <input type="text" name="name" id="contact_form_username">
                            </div>
                            <div class="columns1_3">
                                <label class="required" for="contact_form_username">Time Of Damo</label>
                                <input type="text" name="name" id="contact_form_username">
                            </div>
                           
                        </div>
                        </div>
                        </div>

                        <div class="sc_contact_form_button">
                            <div class="squareButton sc_button_size sc_button_style_global global ico">
                                <button type="submit" name="contact_submit"
                                    class="contact_form_submit icon-comment-1">Send Message</button>
                            </div>
                        </div>

                        <div class="result sc_infobox"></div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    
</section>
<script>
     $(document).ready(function () {
            $('#country_id').on('change', function () {
                var countryId = this.value;
                $('#timezone_id').html('');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: ajaxUrl+'/fetch_timezone',
                    type: 'post',
                    data: {'country_id':countryId},
                    success: function (res) {
                        if(res.status){
                            $('#timezone_id').html('<option value="">Select TimeZone</option>');
                            $.each(res.data, function (key, value) {
                                $('#timezone_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    }
                });
            });
            });
</script>
@endsection
