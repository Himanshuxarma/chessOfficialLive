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
                        <h3 class="card-title">Update FAQ</h3>
                    </div>
                    <form action="{{route('faqsUpdate',$faqs->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="question"> Question </label>
                                        <input type="text" name="question" class="form-control" value="{{$faqs->question}}" require placeholder="Enter  Question">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="answer">Answer</label>
                                        <input type="text" name="answer" class="form-control" value="{{$faqs->answer}}" require placeholder="Enter  Answer">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" name="status" value="1" type="checkbox" {{($faqs->status==1 ? 'checked': '')}}>
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
