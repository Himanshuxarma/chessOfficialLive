@extends('admin.layouts.master')
@section('customstyle')
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
                  <h3 class="card-title">Update  Testimonial</h3>
             </div>
             <form id="quickForm" action="{{route('testimonialsUpdate',$testimonials->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf

                 <div class="card-body">
                   <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                            <label for="title"> Title </label>
                            <input type="text" name="title" class="form-control" value="{{$testimonials->title}}"id="" require placeholder="Enter  Title">
                         </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="description">Description</label>
                          <textarea id="summernote" name="description"> {{$testimonials->description}}</textarea>
                        </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="image"> Image</label>
                              <input type="file" name="image" class="form-control" id="image"require placeholder=" Image">
                              <td><img src="/uploads/testimonials/{{$testimonials->image}}" alt="{{$testimonials->image}}" width="50%" /></td>
                           </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="rating"> Rating</label>
                              <input type="text" name="rating" class="form-control" value="{{$testimonials->rating}}" id="rating"require placeholder=" Rating">
                              
                           </div>
                        </div>
                   </div>
                    <div class="form-group">
                          <div class="form-check">
                          <input class="form-check-input" name="status" value="1"type="checkbox" {{($testimonials->status==1 ? 'checked': '')}}>
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
    $('#summernote').summernote();
</script>
@endsection


