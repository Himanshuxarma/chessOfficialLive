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
                 <a class="btn btn-sm btn-success  " href="{{route('countryCreate')}}"> Create Country</a>
            </div>
             <div class="card-body table-responsive">
                <table class="table table-head-fixed text-nowrap" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col" width="10%">#</th>
                            <th scope="col" width="10%">Name</th>
                            <th scope="col" width="10%">Country Code</th>
                            <th scope="col" width="10%">Currency</th>
                            <th scope="col" width="10%">Country Flag</th>
                            <th scope="col" width="10%">Status</th>
                            <th scope="col" width="10%">Action</th>
                         </tr>
                    </thead>
                    <tbody>
                        @foreach ($country as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->country }}</td>
                            <td>{{ $data->country_code }}</td>
                            <td>{{ $data->currency }}</td>
                            <td><img src="/uploads/country/{{$data->country_flag}}" alt="{{$data->country_flag}}" width="20%" /></td>
                            @if($data->status == "1")
                            <td class="project-state">
                                <a href="{{ route('countryStatus',$data->id) }}"><span class="badge badge-success">Active</span></a>
                            </td>
                            @else
                            <td class="project-state">
                                <a href="{{ route('countryStatus',$data->id) }}"><span class="badge badge-danger">Inactive</span></a>
                            </td>
                            @endif
                            <td>
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-default dropdown-toggle"
                                        data-toggle="dropdown"> Action</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('timezone.List',$data->id)}}">Time Zone</a>
                                        <a class="dropdown-item" href="{{ route('countryEdit',$data->id) }}">Edit</a>
                                        <a class="dropdown-item" href="{{ route('countryDelete',$data->id) }}">Delete</a>
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
