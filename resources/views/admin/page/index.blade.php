@extends('admin.layouts.master')
@section('customstyle')
@section('page_select','active')
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                @if ($message = Session::get('success'))

                <p class="alert alert-success hide1 ">
                    {{ $message }}
                </p>
                @endif
                <a class="btn btn-sm btn-success  " href="{{route('pageCreate')}}"> Create Pages</a>
                <div class="card-tools">

                </div>
            </div>
             <div class="card-body table-responsive">
                <table class="table table-head-fixed text-nowrap" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col" width="10%">#</th>
                            <th scope="col" width="10%">Title</th>
                            <th scope="col" width="10%">Banner Image</th>
                            <th scope="col" width="10%">Status</th>
                            <th scope="col" width="10%">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $page)
                        <tr>
                            <td>{{ $page->id }}</td>
                            <td>{{ strlen(strip_tags($page->title)) > 50  ? substr(strip_tags($page->title), 0, 40).' ...' : strip_tags($page->title) }}</td>
                            <td><img src="/uploads/pages/{{$page->banner_image}}" alt="{{$page->banner_image}}" width="20%" /></td>
                            @if($page->status == "1")

                            <td class="project-state">
                                <a href="{{ route('pageStatus',$page->id) }}"><span class="badge badge-success">Active</span></a>
                            </td>
                            @else
                            <td class="project-state">
                                <a href="{{ route('pageStatus',$page->id) }}"><span  class="badge badge-danger">Inactive</span></a>
                            </td>
                            @endif
                            <td>
                               <div class="input-group-prepend">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> Action</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('pageEdit',$page->id) }}">Edit</a>
                                        <a class="dropdown-item" href="{{ route('pageDelete',$page->id) }}">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                   </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('customscript')
<script>
    setTimeout(function () {
        $('.hide1').fadeOut('slow');
    }, 5000);
    let table = new DataTable('#myTable');

</script>
@endsection
