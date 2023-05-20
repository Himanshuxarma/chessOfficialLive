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
                        <h3 class="card-title">Update Offer</h3>
                    </div>
                    <form action="{{route('offersUpdate',$offers->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title"> Title </label>
                                        <input type="text" name="title" class="form-control" value="{{$offers->title}}" require placeholder="Enter  title">
                                    </div>
                                </div>
                                <div class="col-md-6">
                        <div class="form-group">
                          <label for="description">Description</label>
                          <textarea id="summernote" name="description"> {{$offers->description}}</textarea>
                        </div>
                      </div>
                            </div>
                            <div class="col-md-6">
                          <div class="form-group">
                              <label for="image">Image</label>
                              <input type="file" name="image" class="form-control" id="image"require placeholder="Image">
                              <img src="/uploads/offers/{{$offers->image}}" alt="{{$offers->image}}" width="20%" />
                           </div>
                        </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" name="status" value="1" type="checkbox" {{($offers->status==1 ? 'checked': '')}}>
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
<script>
      $('#summernote').summernote();
</script>
@endsection
