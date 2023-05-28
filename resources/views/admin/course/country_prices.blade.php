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
                                $i=0;
                                foreach($countries as $countryId=>$country){
                            ?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="hidden" name="country_id[{{$i}}]" value="{{$countryId}}">
                                            <input type="text" name="country[{{$i}}]" class="form-control" placeholder="Country" value="{{$country}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" name="price[{{$i}}]" class="form-control" placeholder="Course Price" value="{{!empty($coursePrices) && !empty($coursePrices[$i]) && $coursePrices[$i]->price ? $coursePrices[$i]->price : 0}}" require>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" name="status[{{$i}}]" value="1" type="checkbox" {{ isset($coursePrices[$i]->status) && $coursePrices[$i]->status == 1 ? 'checked': ''}}>
                                            <label class="form-check-label">Status</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            <?php
                                $i++;
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
