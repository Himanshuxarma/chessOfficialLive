@extends('admin.layouts.master')
@section('customstyle')
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Setting</h3>
                    </div>
                     <form id="quickForm" action="{{route('settingsSave')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name"> First Name </label>
                                        <input type="text" name="first_name" class="form-control" id="first_name"require placeholder="Enter  First Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" id="last_name" require placeholder="last_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email"> Email </label>
                                        <input type="email" name="email" class="form-control" id="email" require placeholder="Enter  Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone1">Phone1</label>
                                        <input type="text" name="phone1" class="form-control" id="phone1" require placeholder="phone1">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone2"> Phone2 </label>
                                        <input type="text" name="phone2" class="form-control" id="phone2" require placeholder="Enter Phone2">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="front_logo">Front Logo</label>
                                        <input type="file" name="front_logo" class="form-control" id="front_logo" require placeholder="Front Logo">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="back_logo"> Back Logo </label>
                                        <input type="file" name="back_logo" class="form-control" id="back_logo" require placeholder="Enter  Back Logo">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="profile_picture">Profile Picture</label>
                                        <input type="file" name="profile_picture" class="form-control" id="profile_picture" require placeholder="Profile Picture">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address"> Address </label>
                                        <input type="text" name="address" class="form-control" id="address" require placeholder="Enter  Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_login">Last Login</label>
                                        <input type="text" name="last_login" class="form-control" id="last_login" require placeholder="last_login">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="facebook_link"> Facebook Link </label>
                                        <input type="text" name="facebook_link" class="form-control" id="facebook_link"require placeholder="Enter  Facebook Link">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="instagram_link">Instagram Link</label>
                                        <input type="text" name="instagram_link" class="form-control"id="instagram_link" require placeholder="instagram_link">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="google_link"> Google Link </label>
                                        <input type="text" name="google_link" class="form-control" id="google_link" require placeholder="Enter  google Link">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="linkedin_link">Linkedin Link</label>
                                        <input type="text" name="linkedin_link" class="form-control" id="linkedin_link"require placeholder="Linkedin Link">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pinterest_link"> Pinterest Link </label>
                                        <input type="text" name="pinterest_link" class="form-control"id="pinterest_link" require placeholder="Enter  Pinterest Link">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Snapchat_link">Snapchat Link</label>
                                        <input type="text" name="snapchat_link" class="form-control" id="Snapchat_link" require placeholder="Snapchat Link">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="twitter_link"> Twitter Link </label>
                                        <input type="text" name="twitter_link" class="form-control"id="twitter_link" require placeholder="Enter  Twitter Link">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="themeforest_link">Themeforest Link</label>
                                        <input type="text" name="themeforest_link" class="form-control" id="themeforest_link" require placeholder="Themeforest Link">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projects_done"> Projects Done </label>
                                        <input type="text" name="projects_done" class="form-control"id="projects_done" require placeholder="Enter Projects Done">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="satisfied_clients">Satisfied Clients</label>
                                        <input type="text" name="satisfied_clients" class="form-control" id="satisfied_clients" require placeholder="Satisfied Clients">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country_numbers"> Country Numbers Done </label>
                                        <input type="text" name="country_numbers" class="form-control"id="country_numbers" require placeholder="Enter Country Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="employee_counts">Employee Counts</label>
                                        <input type="text" name="employee_counts" class="form-control" id="employee_counts" require placeholder="Employee Counts">
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
    $(function () {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })

</script>
@endsection
