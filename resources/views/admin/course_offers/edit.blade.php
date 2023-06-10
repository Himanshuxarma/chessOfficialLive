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
                        <h3 class="card-title">Course Offer</h3>
                    </div>
                    <form action="{{route('Course.Offers.Update',$courseoffers->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="course_id" value="{{$courseoffers->course_id}}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="offer_id"> Offers </label>
                                        <select id="offer_id" class="form-control" name="offer_id">
                                            <option value="">--Select Offer--</option>
                                            @foreach($offers as $data){
                                            <option value="{{$data->id}}" {{$courseoffers->offer_id == $data->id  ? 'selected' : ''}}>{{ $data->title}}</option>
                                            }
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country_id">Country</label>
                                        <select class="form-control" name="country_id" id="country_id">
                                            @foreach($country as $data)
                                            <option value="{{$data->id}}"{{$courseoffers->country_id == $data->id  ? 'selected' : ''}}>{{ $data->country}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="amount"> Percentage </label>
                                        <input type="number" name="amount" class="form-control" require value="{{$courseoffers->amount}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start">Start</label>
                                        <input type="date" name="start" class="form-control" require value="{{$courseoffers->start}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end"> End </label>
                                        <input type="date" name="end" class="form-control" require value="{{$courseoffers->end}}">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" name="status" value="1" type="checkbox"
                                        {{($courseoffers->status==1 ? 'checked': '')}}>
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
