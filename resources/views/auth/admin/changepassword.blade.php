@extends('admin.layouts.master')
@section('customstyle')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card card-primary ">
                   
                    <form action="{{route('change.password')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <div class="card-body ">
                         @if ($message = Session::get('success'))
                            <p class="alert alert-success hide1 ">
                                {{ $message }}
                            </p>
                        @elseif ($message = Session::get('error'))
                            <p class="alert alert-danger hide1 ">
                                {{ $message }}
                            </p>
                        @endif
                                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="current_password"> Current Password </label>
                                        <input type="password" name="current_password" class="form-control" require autocomplete="current-password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="new_password">New Password</label>
                                        <input type="password" name="new_password" class="form-control" require autocomplete="current-password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="new_confirm_password">New Confirm Password</label>
                                        <input type="password" name="new_confirm_password" class="form-control" require autocomplete="current-password">
                                    </div>
                                </div>
                            

                         
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"> Update Password</button>
                            </div>
                    </form>

                </div>

            </div>
        </div>
</section>

@endsection
@section('customscript')
@endsection
