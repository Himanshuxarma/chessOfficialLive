@extends('admin.layouts.master')
@section('customstyle')
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
                  <h3 class="card-title">Add  Setting</h3>
             </div>
             <form id="quickForm" action="{{route('settingsUpdate',$settings->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                   <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                            <label for="first_name"> First Name </label>
                            <input type="text" name="first_name" class="form-control"value="{{$settings->first_name}}" id="first_name" require placeholder="Enter  First Name">
                         </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control"value="{{$settings->last_name}}" id="last_name"require placeholder="last_name">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                            <label for="email"> Email </label>
                            <input type="email" name="email" class="form-control" id="email" value="{{$settings->email}}" require placeholder="Enter  Email">
                         </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="phone1">Phone1</label>
                            <input type="text" name="phone1" class="form-control"value="{{$settings->phone1}}" id="phone1"require placeholder="phone1">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                            <label for="phone2"> Phone2 </label>
                            <input type="text" name="phone2" class="form-control" value="{{$settings->phone2}}"id="phone2" require placeholder="Enter Phone2">
                         </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="front_logo">Front Logo</label>
                        <input type="file" name="front_logo" class="form-control" id="front_logo"require placeholder="Front Logo">
                        <td><img src="/uploads/settings/{{$settings->front_logo}}" alt="{{$settings->front_logo}}" width="20%" /> </td>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                            <label for="back_logo"> Back Logo </label>
                            <input type="file" name="back_logo" class="form-control" id="back_logo" require placeholder="Enter  Back Logo">
                            <td><img src="/uploads/settings/{{$settings->back_logo}}" alt="{{$settings->back_logo}}" width="20%" /> </td>
                         </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="profile_picture">Profile Picture</label>
                            <input type="file" name="profile_picture" class="form-control" id="profile_picture"require placeholder="Profile Picture">
                            <td><img src="/uploads/settings/{{$settings->profile_picture}}" alt="{{$settings->profile_picture}}" width="20%" /> </td>
                          </div>profile_picture
                        </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                            <label for="address"> Address </label>
                            <input type="text" name="address" class="form-control" value="{{$settings->address}}"id="address" require placeholder="Enter  Address">
                         </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="last_login">Last Login</label>
                            <input type="date" name="last_login" class="form-control"value="{{$settings->last_login}}" id="last_login"require placeholder="last_login">
                          </div>
                        </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                            <label for="facebook_link"> Facebook Link </label>
                            <input type="text" name="facebook_link" class="form-control"value="{{$settings->facebook_link}}" id="facebook_link" require placeholder="Enter  Facebook Link">
                         </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="instagram_link">Instagram Link</label>
                            <input type="text" name="instagram_link" class="form-control" value="{{$settings->instagram_link}}"id="instagram_link"require placeholder="instagram_link">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                            <label for="google_link"> Google Link </label>
                            <input type="text" name="google_link" class="form-control"value="{{$settings->google_link}}" id="google_link" require placeholder="Enter  google Link">
                         </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="linkedin_link">Linkedin Link</label>
                            <input type="text" name="linkedin_link" class="form-control" value="{{$settings->linkedin_link}}"id="linkedin_link"require placeholder="Linkedin Link">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                            <label for="pinterest_link"> Pinterest Link </label>
                            <input type="text" name="pinterest_link" class="form-control"value="{{$settings->pinterest_link}}" id="pinterest_link" require placeholder="Enter  Pinterest Link">
                         </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="Snapchat_link">Snapchat Link</label>
                            <input type="text" name="Snapchat_link" class="form-control"value="{{$settings->snapchat_link}}" id="Snapchat_link"require placeholder="Snapchat Link">
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


