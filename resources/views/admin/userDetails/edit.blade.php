@extends('admin.layouts.master')
@section('customstyle')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update User Details</h3>
                    </div>
                    <form action="{{route('userDetailsUpdate',$userDetails->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                             <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name"> First Name </label>
                                        <input type="text" name="first_name" class="form-control" value="{{$userDetails->first_name}}" require>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" name="last_name" class="form-control"value="{{$userDetails->last_name}}" require>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dob"> Date Of Birth</label>
                                        <input type="date" name="dob" class="form-control"value="{{$userDetails->dob}}" require>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="blood_group">Blood Group</label>
                                        <input type="text" name="blood_group" class="form-control" value="{{$userDetails->blood_group}}"require>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="profile_image">Progile Image</label>
                                        <input type="file" name="profile_image" class="form-control"value="{{$userDetails->profile_image}}" require>
                                        <img src="/uploads/userDetails/{{$userDetails->profile_image}}" alt="{{$userDetails->profile_image}}" width="30%" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recovery_mobile">Recovery Mobile</label>
                                        <input type="text" name="recovery_mobile" class="form-control"value="{{$userDetails->recovery_mobile}}" require>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="recovery_email">Recovery Email</label>
                                    <input type="email" name="recovery_email" class="form-control" value="{{$userDetails->recovery_email}}"require>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                    <input class="form-check-input" name="status" value="1" type="checkbox" {{($userDetails->status==1 ? 'checked': '')}}>
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
@endsection
