@extends('front.layouts.dashboardMaster')
@section('content')
<div class="pagetitle">
      <h1>Profile</h1>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">

        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">{{$customer->full_name}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Date Of Birth</div>
                    <div class="col-lg-9 col-md-8">{{$customer->dob}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8">{{$customer->country}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">State</div>
                    <div class="col-lg-9 col-md-8">{{$customer->state}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">City</div>
                    <div class="col-lg-9 col-md-8">{{$customer->city}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">{{$customer->address}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">{{$customer->phone}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{$customer->email}}</div>
                  </div>

                </div>
                

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="{{route('profile.Update',$customer->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <label for="full_name" class="col-form-label">Full Name</label>
                        <input name="full_name" type="text" class="form-control" id="full_name" value="{{$customer->full_name}}">
                      </div>
                    
                      <div class="col-md-6">
                        <label for="Phone" class="col-form-label">Phone</label>
                        <input name="phone" type="text" class="form-control" id="Phone" value="{{$customer->phone}}">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <label for="Email" class="col-form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="Email" value="{{$customer->email}}">
                      </div>
                    
                      <div class="col-md-6">
                        <label for="Country" class="col-form-label">Country</label>
                        <input name="country" type="text" class="form-control" id="Country" value="{{$customer->country}}">
                      </div>
                    </div>
                    

                    <div class="row">
                      <div class="col-md-6">
                        <label for="state" class="col-form-label">State</label>
                        <input name="state" type="text" class="form-control" id="state" value="{{$customer->state}}">
                      </div>
                    
                      <div class="col-md-6">
                        <label for="city" class="col-form-label">City</label>
                        <input name="city" type="text" class="form-control" id="city" value="{{$customer->city}}">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label for="dob" class="col-form-label">Date Of Birth</label>
                        <input name="dob" type="date" class="form-control" id="dob" value="{{$customer->dob}}">
                      </div>
                    
                      <div class="col-md-6">
                        <label for="user_image" class="col-form-label"> Customer Image</label>
                        <input name="user_image" type="file" class="form-control" id="user_image" value="{{$customer->user_image}}">
                        <img src="/uploads/customer/{{$customer->user_image}}"alt="{{$customer->user_image}}" width="15%" />
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <label for="Address" class="col-form-label">Address</label>
                        <input name="address" type="text" class="form-control" id="Address" value="{{$customer->address}}">
                      </div>
                    </div>

                    <div class="row mt-4">
                      <div class="text-right">
                        <button type="submit" class="btn btn-lg float-right btn-primary">Save Changes</button>
                      </div>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row">
                      <div class="col-md-6">
                        <label for="currentPassword" class="col-form-label">Current Password</label>
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                      <div class="col-md-6">
                        <label for="newPassword" class="col-form-label">New Password</label>
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <label for="renewPassword" class="col-form-label">Re-enter New Password</label>
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="row mt-4">
                      <div class="text-right">
                        <button type="submit" class="btn btn-lg float-right btn-primary">Change Password</button>
                      </div>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
    @endsection