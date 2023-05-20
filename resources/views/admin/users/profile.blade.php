@extends('admin.layouts.master')
@section('customstyle')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Customer Profile</h3>
                    </div>
                    <form action="{{route('user.profile.Update',$userprofile->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="full_name">Full Name</label>
                                        <input type="text" name="full_name" class="form-control" value="{{$userprofile->full_name}}" require>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <input type="country" name="country" class="form-control" value="{{$userprofile->country}}" require>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <input type="text" name="state" class="form-control" value="{{$userprofile->state}}" require>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" name="city" class="form-control"value="{{$userprofile->city}}" require>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" value="{{$userprofile->address}}" require>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dob"> Date Of Birth </label>
                                        <input type="date" name="dob" class="form-control" value="{{$userprofile->dob}}"require>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" class="form-control" value="{{$userprofile->phone}}" require>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user_image"> User Image</label>
                                        <input type="file" name="user_image" class="form-control" value="{{$userprofile->user_image}}" require>
                                        <img src="/uploads/users/{{$userprofile->user_image}}"alt="{{$userprofile->user_image}}" width="15%" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{$userprofile->email}}" require>
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
    </div>
</section>
@endsection
@section('customscript')
@endsection
