@extends('admin.layouts.master')
@section('customstyle')
@section('users_select','active')
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
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-head-fixed text-nowrap" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col" width="10%">#</th>
                            <th scope="col" width="10%">Full Name</th>                            
                            <th scope="col" width="10%">Email</th>
                            <th scope="col" width="10%">Phone</th>
                            <th scope="col" width="10%">Country</th>
                            <th scope="col" width="10%">State</th>
                            <th scope="col" width="10%">City</th>
                            <th scope="col" width="10%">Address</th>
                            <th scope="col" width="10%">Role</th>
                            <th scope="col" width="10%">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ (! empty( $data->full_name) && $data->full_name != '') ? $data->full_name : 'N/A'}}</td>
                            <td>{{ (! empty($data->email) && $data->email != '') ? $data->email : 'N/A' }}</td>
                            <td>{{ (! empty($data->phone) && $data->phone != '') ? $data->phone : 'N/A' }}</td>
                            <td>{{ (! empty ($data->country) && $data->country != '') ? $data->country : 'N/A'}}</td>
                            <td>{{ (! empty ($data->state) && $data->state != '') ? $data->state : 'N/A'}}</td>
                            <td>{{ (! empty ($data->city) && $data->city != '') ? $data->city : 'N/A'}}</td>
                            <td>{{ (! empty ($data->address) && $data->address != '') ? $data->address : 'N/A'}}</td>
                            <td><span class="badge badge-success">{{ (!empty($data->role) && $data->role != '') ? $data->role : 'N/A'}}</span></td>

                            <td>
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-default dropdown-toggle"
                                        data-toggle="dropdown"> Action</button>
                                    <div class="dropdown-menu">
                                        <!-- <a class="dropdown-item" href="{{ route('userDetailsList',$data->id) }}">Details</a> -->
                                        <!-- <a class="dropdown-item" href="{{ route('usersEdit',$data->id) }}">Edit</a> -->
                                        <a class="dropdown-item" href="{{ route('usersDelete',$data->id) }}">Delete</a>
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
