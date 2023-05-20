@extends('admin.layouts.master')
@section('customstyle')
@section('testimonial_select','active')
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
                @endif
                <!-- <a class="btn btn-sm btn-success"href="{{route('testimonialsCreate')}}"> Create Testimonial</a> -->

            </div>
            <div class="card-body table-responsive">
                <table class="table table-head-fixed text-nowrap" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col" width="10%">#</th>
                            <th scope="col" width="10%">Title</th>
                            <th scope="col" width="10%">Description</th>
                            <th scope="col" width="10%"> Image</th>
                            <th scope="col" width="10%"> Rating</th>
                            <th scope="col" width="10%">Status</th>
                            <th scope="col" width="10%">Action</th>
                       </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimonials as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->title }}</td>
                            <td>{{ strlen(strip_tags($data->description) < 100 ) ? substr(strip_tags($data->description), 0, 50).' ...' : strip_tags($data->description)}}</td>
                            <td><img src="/uploads/testimonials/{{$data->image}}" alt="{{$data->image}}" width="50%"/></td>
                            <td class="rating">@for($i=1; $i<=$data->rating; $i++) 
                            <span  style="color: orange;"class="fa fa-star" value="{{$data->rating  }}"></span>
                            @endfor
                            </td>
                            @if($data->status == "1")
                            <td class="project-state">
                                <a href="{{ route('testimonialsStatus',$data->id) }}"><span class="badge badge-success">Active</span></a>
                            </td>
                            @else
                            <td class="project-state">
                                <a href="{{ route('testimonialsStatus',$data->id) }}"><span class="badge badge-danger">Inactive</span></a>
                            </td>
                            @endif
                            <td>
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> Action</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('testimonialsEdit',$data->id) }}">Edit</a>
                                        <a class="dropdown-item" href="{{ route('testimonialsDelete',$data->id) }}">Delete</a>
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
