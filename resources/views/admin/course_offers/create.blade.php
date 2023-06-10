@extends('admin.layouts.master')
@section('customstyle')
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Course Offer</h3>
                    </div>
                    <form action="{{route('Course.offers.Save')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="course_id" id="course_id" value="{{$courseId}}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="offer_id"> Offers </label>
                                        <select id="offer_id" class="form-control" name="offer_id" >
                                    <option value="">--Select Offer--</option>
                                    @foreach($offers as $data){
                                    <option value="{{$data->id}}">{{ $data->title }}</option>
                                    }
                                    @endforeach
                                </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country_id">Country</label>
                                        <select id="country_id" class="form-control" name="country_id" >
                                            <option value="">--Select Country--</option>
                                            @foreach($country as $data)
                                                <option value="{{$data->id}}">{{ $data->country }}</option>
                                            @endforeach
                                        </select>
                                        <span class="validation_error" id="countrySelectedError"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="amount"> Percentage </label>
                                        <input type="number" name="amount" class="form-control" require placeholder="Enter  amount">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start">Start</label>
                                        <input type="date" name="start" class="form-control" require placeholder="start">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end"> End </label>
                                        <input type="date" name="end" class="form-control" require placeholder="Enter end">
                                    </div>
                                </div>
                                
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" name="status" value="1" type="checkbox">
                                        <label class="form-check-label">Status</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
</section>
@endsection
@section('customscript')
<script>
    jQuery(document).on('change', '#country_id', function(){
        let countryId = jQuery(this).val();
        let offerId = jQuery('#offer_id').val();
        let courseId = jQuery('#course_id').val();
        
        if(countryId != "" && offerId != ""){
            jQuery.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url: ajaxUrl+'/admin/check-offer-country',
                data: {'country_id': countryId, 'offer_id': offerId, 'course_id': courseId},
                success: function(response){
                    var response = $.parseJSON(response);
                    if(response.status){
                        jQuery('#countrySelectedError').html('This country is already having an offer.').css('color','red');
                    } else {
                        jQuery('#countrySelectedError').html('');
                    }
                }, 
                error: function(error){
                }
            });
        }
    });
</script>
@endsection
