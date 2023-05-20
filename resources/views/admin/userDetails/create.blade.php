@extends('admin.layouts.master')
@section('customstyle')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add User</h3>
                    </div>
                    <form action="{{route('userDetailsSave')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                             <div class="row">
                             <div class="col-md-6">
                             <div class="form-group">
                                        <label for="user_id"> Role </label>
                                        <select class="form-control" name="user_id" id="user_id">
                                            <option value="">--Select User--</option>
                                            @foreach($users as $user){
                                            <option value="{{$user->id}}">{{ $user->name }}</option>
                                            }
                                            @endforeach
                                        </select>
                                    </div>
                                        </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name"> First Name </label>
                                        <input type="text" name="first_name" class="form-control" require>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" require>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dob"> Date Of Birth</label>
                                        <input type="date" name="dob" class="form-control" require>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="blood_group">Blood Group</label>
                                        <input type="text" name="blood_group" class="form-control" require>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="profile_image">Progile Image</label>
                                        <input type="file" name="profile_image" class="form-control" require>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recovery_mobile">Recovery Mobile</label>
                                        <input type="text" name="recovery_mobile" class="form-control" require>
                                    </div>
                                </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="recovery_email">Recovery Email</label>
                                    <input type="email" name="recovery_email" class="form-control" require>
                                </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" name="status" value="1" type="checkbox">
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
