@extends('admin.layouts.master')
@section('customstyle')
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Course Featured</h3>
            </div>
            <form action="{{route('storeCourseFeatured')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="course_id" value="{{$courseData->id}}">
                <div class="card-body">
                    @for($i= 0; $i < 5; $i++)
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="feature"> Features {{$i}} </label>
                                    <input type="text" name="data[{{$i}}][feature]" class="form-control"
                                        value="{{(isset($courseFeatured[$i]) && !empty($courseFeatured[$i]) && $courseFeatured[$i]->feature) ? $courseFeatured[$i]->feature : 0}}"require>
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" name="data[{{$i}}][status]" value="1" type="checkbox" {{ isset($courseFeatured[$i]->status) && $courseFeatured[$i]->status == 1 ? 'checked': ''}}>
                                        <label class="form-check-label">Status</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@section('customscript')
@endsection
