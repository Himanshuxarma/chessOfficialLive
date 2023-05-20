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
                        <h3 class="card-title">Update Country</h3>
                    </div>
                    <form action="{{route('countryUpdate',$country->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country"> Name </label>
                                        <input type="text" name="country" class="form-control" value="{{$country->country}}" require placeholder="Enter  country">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country_code">Country Code</label>
                                        <input type="text" name="country_code" class="form-control" value="{{$country->country_code}}" require placeholder="Enter  country_code">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="currency">Currency</label>
                                        <input type="text" name="currency" class="form-control" require placeholder="Enter  currency">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country_flag">Country Flag</label>
                                        <input type="file" name="country_flag" class="form-control" id="country_flag" require>
                                        <img src="/uploads/country/{{$country->country_flag}}" alt="{{$country->country_flag}}" width="20%" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" name="status" value="1" type="checkbox" {{($country->status==1 ? 'checked': '')}}>
                                    <label class="form-check-label">Status</label>
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
