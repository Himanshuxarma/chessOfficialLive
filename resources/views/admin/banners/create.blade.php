@extends('admin.layouts.master')
@section('customstyle')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Banner</h3>
                    </div>
                    <form id="quickForm" action="{{route('bannersSave')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="banner_title">Banner Title </label>
                                        <input type="text" name="banner_title" class="form-control" id="banner_title"require placeholder="Enter Banner Title">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="page_name">Page Name</label>
                                        <input type="text" name="page_name" class="form-control" id="page_name" require placeholder="Page Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="banner_image">Banner Image</label>
                                        <input type="file" name="banner_image" class="form-control" id="banner_image" require placeholder="Banner Image">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" require id="status" name="status"
                                            aria-label=".form-select-sm example">
                                            <option selected>Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">InActive</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
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
