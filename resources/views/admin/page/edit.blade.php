@extends('admin.layouts.master')
@section('customstyle')
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
                  <h3 class="card-title">Add  Pages</h3>
             </div>
              <form id="quickForm" action="{{route('pageUpdate',$pages->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                   <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                            <label for="title"> Title </label>
                            <input type="text" name="title" class="form-control" value="{{$pages->title}}"id="page_title" require placeholder="Enter  Title">
                         </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="page_name">Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{$pages->slug}}"id="page_slug"require placeholder="slug">
                          </div>
                        </div>
                    </div>
                     <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="description">Description</label>
                          <textarea id="summernote" name="description"> {{$pages->description}}</textarea>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="banner_image">Banner Image</label>
                              <input type="file" name="banner_image" class="form-control" id="banner_image"require placeholder="Banner Image">
                              <img src="/uploads/pages/{{$pages->banner_image}}" alt="{{$pages->banner_image}}" width="20%" />
                           </div>
                        </div>
                   </div>
                   <div class="form-group">
                          <div class="form-check">
                          <input class="form-check-input" name="status" value="1" type="checkbox" {{($pages->status==1 ? 'checked': '')}}>
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
    
    $('#summernote').summernote()

</script>

@endsection


