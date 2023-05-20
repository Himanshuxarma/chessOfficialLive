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
                        <h3 class="card-title">Add Course Prices</h3>
                    </div>
                    <form action="{{route('storeCoursePrices')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="course_id" value="{{$courseId}}">
                        <div class="card-body">
                            <?php 
                            if(!empty($countries)){
                                foreach($countries as $countryId=>$country){
                            ?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="hidden" name="country_id[{{$countryId}}]" value="{{$countryId}}">
                                            <input type="text" name="country[{{$countryId}}]" class="form-control" placeholder="Country" value="{{$country}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" name="price[{{$countryId}}]" class="form-control" placeholder="Course Price" value="{{!empty($coursePrices) && !empty($coursePrices[$countryId]) && $coursePrices[$countryId]->price ? $coursePrices[$countryId]->price : 0}}" require>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" name="status[{{$countryId}}]" value="1" type="checkbox" {{ isset($coursePrices[$countryId]->status) && $coursePrices[$countryId]->status == 1 ? 'checked': ''}}>
                                            <label class="form-check-label">Status</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            <?php
                                }
                            }
                            ?>
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
    var slug = function (str) {
        var $slug = '';
        var trimmed = $.trim(str);
        $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
        replace(/-+/g, '-').
        replace(/^-|-$/g, '');
        return $slug.toLowerCase();
    }

    $('#page_title').keyup(function () {
        var takedata = $(this).val()
        $('#page_slug').val(slug(takedata));
    });
    $('#summernote').summernote()
</script>
@endsection
