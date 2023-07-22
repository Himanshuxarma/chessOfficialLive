@extends('admin.layouts.master')
@section('customstyle')
@section('course_select','active')
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                @if ($message = Session::get('success'))
                <p class="alert alert-success hide1 ">
                    {{ $message }}
                </p>
                @elseif ($message = Session::get('error'))
                    <p class="alert alert-success hide1 ">
                        {{ $message }}
                    </p>
                @endif
                <a class="btn btn-sm btn-success " href="{{route('coursesCreate')}}"> Create Course</a>
                <div class="card-tools">

                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-head-fixed text-nowrap" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col" width="10%">#</th>
                            <th scope="col" width="10%">Course Type</th>
                            <th scope="col" width="10%">Title</th>
                            <th scope="col" width="10%">Session</th>
                            <th scope="col" width="10%">First Price</th>
                            <th scope="col" width="10%">Second Price</th>
                            <th scope="col" width="10%">Age Group</th>
                            <th scope="col" width="10%">Batch</th>
                            <th scope="col" width="10%">Hrs of training</th>
                            <th scope="col" width="10%">Duration</th>
                            <th scope="col" width="10%">Image</th>
                            <th scope="col" width="10%">Status</th>
                            <th scope="col" width="10%">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($course as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ ucFirst(str_replace('_',' ', $data->type)) }}</td>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->class}}</td>
                            <td>{{ !empty($data->prices[0]) && $data->prices[0]->first_price ? $data->prices[0]->first_price : 'N/A'}}</td>
                            <td>{{ !empty($data->prices[0]) && $data->prices[0]->second_price ? $data->prices[0]->second_price : 'N/A'}}</td>
                            <td>{{ $data->age}}</td>
                            <td>{{ $data->batch}}</td>
                            <td>{{ $data->hrs_training}}</td>
                            <td>{{ $data->duration}}</td>
                            <td><img src="/uploads/course/{{$data->image}}" alt="{{$data->image}}" width="50%" /></td>
                            @if($data->status == "1")
                            <td class="project-state">
                                <a href="{{ route('coursesStatus',$data->id) }}"><span class="badge badge-success">Active</span></a>
                            </td>
                            @else
                            <td class="project-state">
                                <a href="{{ route('coursesStatus',$data->id) }}"><span class="badge badge-danger">Inactive</span></a>
                            </td>
                            @endif
                            <td>
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> Action</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('coursesEdit', $data->id) }}">Edit</a>
                                        <a class="dropdown-item" href="{{route('coursePrices',$data->id) }}">Courses Price</a>
                                        <a class="dropdown-item" href="{{route('courseFeatured',$data->id) }}">Courses Featured</a>
                                        <a class="dropdown-item" href="{{route('Course.Offers.list',$data->id) }}">Offer</a>
                                        <a class="dropdown-item" href="{{route('Course.Curriculum.list',$data->id) }}">Course Curriculum</a>
                                        <a class="dropdown-item" href="{{route('coursesDelete',$data->id) }}">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('customscript')
<script>
    setTimeout(function () {
        $('.hide1').fadeOut('slow');
    }, 5000);
    let table = new DataTable('#myTable');

</script>
@endsection
