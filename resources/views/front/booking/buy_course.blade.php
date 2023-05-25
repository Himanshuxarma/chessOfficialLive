@extends('front.layouts.master')
@section('content')
<section class="no_padding">

    <div class="container">
        <div class="columnsWrap sc_columns sc_columns_count_3 margin_top_middle margin_bottom_middle">
            <div class=" sc_column_item sc_column_item_1 odd first span_2">
                <div class="sc_contact_form sc_contact_form_contact contact_form_1">
                    <h2 class="title">Address</h2>
                    <form class="contact_1" method="post" action="include/contact-form.php">
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

                        <div class="result sc_infobox"></div>
                    </form>
                </div>
                 <div class="sc_contact_form sc_contact_form_contact contact_form_1">
                    <h2 class="title">Course Info</h2>
                    <input type="hidden" name="course_id" value="{{$CourseId->id}}">
                        <div class="columnsWrap">
                             <div class="columns1_3">
                                <label class="required" for="title">Course Name</label>
                                <input type="text" name="title" id="title"value="{{$CourseId->title}}"readonly>
                            </div>
                            <div class="columns1_3">
                                <label class="required" for="type">Course Type</label>
                                <input type="text" name="type" id="type"value="{{$CourseId->type}}"readonly>
                            </div>
                           
                        </div>
                        <div class="columnsWrap">
                            <div class="columns1_3">
                                <label class="required" for="price">Price</label>
                                <input type="text" name="price" id="price"value="{{$CourseId->price}}"readonly>
                            </div>
                        </div>
                </div>
                 <div class="sc_contact_form sc_contact_form_contact contact_form_1">
                    <h2 class="title">Booking Info</h2>
                        <div class="columnsWrap">
                            
                            <div class="columns1_3">
                                <label class="required" for="date_of_demo"> Date Of Demo</label>
                                <input type="text" name="date_of_demo" id="date_of_demo">
                            </div>
                            <div class="columns1_3">
                                <label class="required" for="time_of_demo"> Time Of Demo</label>
                                <input type="text" name="time_of_demo" id="time_of_demo">
                            </div>
                           
                        </div>

                        
                   
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
