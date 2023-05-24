@extends('admin.layouts.master')
@section('customstyle')
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Course Curriculum</h3>
                    </div>
                    <form action="{{route('storeCurriculum')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="course_id" value="{{$courseData->id}}">
                        <div class="card-body">
                            @for($i= 1; $i < 9; $i++)
                             <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="title"> Title {{$i}} </label>
                                        <input type="text" name="data[{{$i}}][title]" class="form-control"
                                            value="{{(isset($courseCurriculum[$i]) && !empty($courseCurriculum[$i]) && $courseCurriculum[$i]->title) ? $courseCurriculum[$i]->title : 0}}"require>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="description"> description {{$i}} </label>
                                        <input type="text" name="data[{{$i}}][description]" class="form-control"
                                            value="{{(isset($courseCurriculum[$i]) && !empty($courseCurriculum[$i]) && $courseCurriculum[$i]->description) ? $courseCurriculum[$i]->description : 0}}"require>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="image"> Image {{$i}} </label>
                                        <input type="file" name="data[{{$i}}][image]" class="form-control"
                                            value="{{(isset($courseCurriculum[$i]) && !empty($courseCurriculum[$i]) && $courseCurriculum[$i]->image) ? $courseCurriculum[$i]->image : 0}}"require>
                                            
                                    </div>
                                </div>
                                <div class="col-md-3 mt-4">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" name="data[{{$i}}][status]" value="1" type="checkbox" {{ isset($courseCurriculum[$i]->status) && $courseCurriculum[$i]->status == 1 ? 'checked': ''}}>
                                            <label class="form-check-label">Status</label>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        @endfor
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
</section>
@endsection
@section('customscript')
@endsection
