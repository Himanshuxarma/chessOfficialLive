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
                    <form action="{{route('usersUpdate',$users->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role_id"> Role </label>
                                        <select class="form-control" name="role_id" id="role_id">
                                            @foreach($roles as $role)
                                            <option value="{{$role->id}}"{{$users->role_id == $role->id  ? 'selected' : ''}}>{{ $role->title}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control"  value="{{$users->name}}"require >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email"> Email </label>
                                        <input type="email" name="email" class="form-control" value="{{$users->email}}"require>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="account_type">Account Type</label>
                                        <select class="form-control" name="account_type" id="account_type">
                                            <option value="">--Account Type--</option>
                                            @foreach($roles as $role){
                                            <option value="{{$role->id}}"{{$users->role_type == $role->id  ? 'selected' : ''}}>{{ $role->role_type }}</option>
                                            }
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password"> Password </label>
                                        <input type="text" name="password" class="form-control" value="{{$users->password}}"require>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="verification_code">Verification Code</label>
                                        <input type="text" name="verification_code" class="form-control"value="{{$users->verification_code}}" require >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email_verified_at"> Email Verified At </label>
                                        <input type="date" name="email_verified_at" class="form-control"value="{{$users->email_verified_at}}" require >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="remember_token">Remember Token</label>
                                        <input type="text" name="remember_token" class="form-control" value="{{$users->remember_token}}"require >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        
                                        <input class="form-check-input" name="is_verified" value="1" type="checkbox" {{($users->is_verified==1 ? 'checked': '')}}>
                                        <label class="form-check-label">is Verified</label>
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
<script>
    var slug = function (str) {
        var $slug = '';
        var trimmed = $.trim(str);
        $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
        replace(/-+/g, '-').
        replace(/^-|-$/g, '');
        return $slug.toLowerCase();
    }

    $('#page_title').keyup(function () {
        var takedata = $(this).val()
        $('#page_slug').val(slug(takedata));
    });
    $('#summernote').summernote()

</script>
@endsection
