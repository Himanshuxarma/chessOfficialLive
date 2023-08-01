@extends('admin.layouts.master')
@section('customstyle')
@endsection
@section('offers_select','active')
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
                <a class="btn btn-sm btn-success" href="{{route('offersCreate')}}"> Create Offer</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-head-fixed text-nowrap" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col" width="10%">#</th>
                            <th scope="col" width="10%">Title</th>
                            <th scope="col" width="10%">Description</th>
                            <th scope="col" width="10%">Image</th>
                            <th scope="col" width="10%">Status</th>
                            <th scope="col" width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($offers as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ strlen(strip_tags($data->title)) > 50  ? substr(strip_tags($data->title), 0, 20).' ...' : strip_tags($data->title) }}</td>
                            <td>{{ strlen(strip_tags($data->description)) > 50  ? substr(strip_tags($data->description), 0, 40).' ...' : strip_tags($data->description) }}</td>
                            <td><img src="/uploads/offers/{{$data->image}}" alt="{{$data->image}}" width="20%" /></td>
                            @if($data->status == "1")
                            <td class="project-state">
                                <a href="{{ route('offersStatus',$data->id) }}"><span class="badge badge-success">Active</span></a>
                            </td>
                            @else
                            <td class="project-state">
                                <a href="{{ route('offersStatus',$data->id) }}"><span class="badge badge-danger">Inactive</span></a>
                            </td>
                            @endif
                            <td>
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-default dropdown-toggle"
                                        data-toggle="dropdown"> Action</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('offersEdit',$data->id) }}">Edit</a>
                                        <a class="dropdown-item" href="{{ route('offersDelete',$data->id) }}">Delete</a>
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
