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
                        <h3 class="card-title">Update Course</h3>
                    </div>
                    <form action="{{route('coursesUpdate',$course->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type"> Course Type </label>
                                        <select class="form-control" name="type" id="type">
                                            <option value="main_course" {{$course->type =="main_course" ? 'selected' : ''}}>Main Course</option>
                                            <option value="academy_course" {{$course->type =="academy_course" ? 'selected' : ''}}>Academy</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" value="{{$course->title}}" class="form-control"  require placeholder="title">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="featured">Features</label>
                                        <input type="text" name="featured" value="{{$course->featured}}" class="form-control" require placeholder="Enter  featured">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="class">Session</label>
                                        <input type="text" name="class" value="{{$course->class}}" class="form-control" require placeholder="class">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" value="{{$course->price}}" name="price" class="form-control" require placeholder="Enter  price">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="age">Age Group</label>
                                        <select class="form-control" name="age" id="age">
                                            <option value="5-20" {{$course->age =="5-20" ? 'selected' : ''}}>5-20 </option>
                                            <option value="20-40" {{$course->age =="20-40" ? 'selected' : ''}}>20-40</option>
                                            <option value="40-60" {{$course->age =="40-60" ? 'selected' : ''}}>40-60</option>
                                            <option value="60-100" {{$course->age =="60-100" ? 'selected' : ''}}>60-100</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="batch">Batch</label>
                                        <input type="text" name="batch" value="{{$course->batch}}" class="form-control"require placeholder="Enter  batch">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="hrs_training">Hrs Training</label>
                                        <input type="text" name="hrs_training" class="form-control"value="{{$course->hrs_training}}" require placeholder="Enter  hrs_training">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="format">Format</label>
                                        <select class="form-control" name="format" id="format">
                                            <option value="online" {{$course->format =="online" ? 'selected' : ''}}>Online</option>
                                            <option value="offline" {{$course->format =="offline" ? 'selected' : ''}}>Offline</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="duration">Duration</label>
                                        <input type="text" name="duration" class="form-control" value="{{$course->duration}}" require placeholder="Enter  duration">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" class="form-control" require placeholder="Enter Image">
                                        <img src="/uploads/course/{{$course->image}}" alt="{{$course->image}}" width="20%" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea id="summernote" name="description">{{$course->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" name="status" value="1" type="checkbox"{{($course->status==1 ? 'checked': '')}}>
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
    $('#summernote').summernote()
</script>
@endsection
