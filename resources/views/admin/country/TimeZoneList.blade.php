@extends('admin.layouts.master')
@section('customstyle')
@endsection
@section('country_select','active')
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

                <a class="btn btn-sm btn-success " href="{{route('timezoneCreate',$countryId)}}"> Create Time Zone</a>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-head-fixed text-nowrap" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col" width="10%">#</th>
                            <th scope="col" width="10%">Time Zone</th>
                            <th scope="col" width="10%">Status</th>
                            <th scope="col" width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($timezone as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->timezone }}</td>
                            @if($data->status == "1")
                            <td class="project-state">
                                <a href="{{ route('timezoneStatus',$data->id) }}"><span class="badge badge-success">Active</span></a>
                            </td>
                            @else
                            <td class="project-state">
                                <a href="{{ route('timezoneStatus',$data->id) }}"><span class="badge badge-danger">Inactive</span></a>
                            </td>
                            @endif
                            <td>
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> Action</button>
                                    <div class="dropdown-menu">

                                        <a class="dropdown-item" href="{{ route('timezoneEdit',$data->id) }}">Edit</a>
                                        <a class="dropdown-item" href="{{ route('timezoneDelete',$data->id) }}">Delete</a>
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
