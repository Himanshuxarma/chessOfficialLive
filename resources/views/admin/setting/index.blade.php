@extends('admin.layouts.master')
@section('customstyle')
@endsection
@section('setting_select','active')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Setting</h3>
                    </div>
                     <form id="quickForm" action="{{route('settingsUpdate',$settings->id)}}" method="POST"enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name"> First Name </label>
                                        <input type="text" name="first_name" class="form-control"value="{{$settings->first_name}}" require>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" name="last_name" class="form-control"value="{{$settings->last_name}}" require>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email"> Email </label>
                                        <input type="email" name="email" class="form-control" value="{{$settings->email}}" require>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone1">Phone1</label>
                                        <input type="text" name="phone1" class="form-control" value="{{$settings->phone1}}" minlength="10" maxlength="10" onkeypress="return isNumberKey(event)" require>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone2"> Phone2 </label>
                                        <input type="text" name="phone2" class="form-control" value="{{$settings->phone2}}" minlength="10" maxlength="10" onkeypress="return isNumberKey(event)">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address"> Address </label>
                                        <input type="text" name="address" class="form-control" value="{{$settings->address}}" require>
                                    </div>
                                </div>
                                
                             
                            </div>

                            <div class="row">
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="front_logo">Front Logo</label>
                                        <input type="file" name="front_logo" class="form-control" require>
                                        <img src="/uploads/settings/{{$settings->front_logo}}" alt="{{$settings->front_logo}}" width="20%" />
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="header_logo">Header Logo</label>
                                        <input type="file" name="header_logo" class="form-control" require>
                                        <img src="/uploads/settings/{{$settings->header_logo}}" alt="{{$settings->header_logo}}" width="20%" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="back_logo"> Back Logo </label>
                                        <input type="file" name="back_logo" class="form-control" require>
                                        <img src="/uploads/settings/{{$settings->back_logo}}" alt="{{$settings->back_logo}}" width="20%" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="profile_picture">Profile Picture</label>
                                        <input type="file" name="profile_picture" class="form-control" id="profile_picture" require>
                                        <img src="/uploads/settings/{{$settings->profile_picture}}" alt="{{$settings->profile_picture}}" width="20%" />
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_login">Last Login</label>
                                        <input type="date" name="last_login" class="form-control" value="{{$settings->last_login}}" require>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="facebook_link"> Facebook Link </label>
                                        <input type="text" name="facebook_link" class="form-control" value="{{$settings->facebook_link}}" require>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="instagram_link">Instagram Link</label>
                                        <input type="text" name="instagram_link" class="form-control" value="{{$settings->instagram_link}}" require>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="google_link"> Google Link </label>
                                        <input type="text" name="google_link" class="form-control" value="{{$settings->google_link}}" require>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="linkedin_link">Linkedin Link</label>
                                        <input type="text" name="linkedin_link" class="form-control" value="{{$settings->linkedin_link}}" require>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="twitter_link"> Twitter Link </label>
                                        <input type="text" name="twitter_link" class="form-control"value="{{$settings->twitter_link}}" require>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="whatsapp_no">WhatsApp No.</label>
                                        <input type="text" name="whatsapp_no" class="form-control" value="{{$settings->whatsapp_no}}" require>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projects_done"> Projects Done </label>
                                        <input type="text" name="projects_done" class="form-control"value="{{$settings->projects_done}}" require>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="satisfied_clients">Satisfied Clients</label>
                                        <input type="text" name="satisfied_clients" class="form-control" value="{{$settings->satisfied_clients}}" require>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country_numbers"> Country Numbers Done </label>
                                        <input type="text" name="country_numbers" class="form-control"value="{{$settings->country_numbers}}" require>
                                    </div>
                            </div>
                            <div class="row">
                                
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="employee_counts">Employee Counts</label>
                                        <input type="text" name="employee_counts" class="form-control"value="{{$settings->employee_counts}}" require>
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
<script>
    function w(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

</script>
@endsection
