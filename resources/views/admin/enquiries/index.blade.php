@extends('admin.layouts.master')
@section('customstyle')
@section('contact_select','active')
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col" width="10%">#</th>
                            <th scope="col" width="10%">Full Name</th>
                            <th scope="col" width="10%">Email</th>
                            <th scope="col" width="10%">Phone</th>
                            <th scope="col" width="10%">Subject</th>
                            <th scope="col" width="10%">Message</th>
                            <th scope="col" width="10%">Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->id }}</td>
                            <td>{{ strlen(strip_tags($contact->full_name)) > 50  ? substr(strip_tags($contact->full_name), 0, 20).' ...' : strip_tags($contact->full_name) }}</td>
                            <td>{{ strlen(strip_tags($contact->email)) > 50  ? substr(strip_tags($contact->email), 0, 20).' ...' : strip_tags($contact->email) }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ strlen(strip_tags($contact->subject)) > 50  ? substr(strip_tags($contact->subject), 0, 20).' ...' : strip_tags($contact->subject) }}</td>
                            <td>{{ strlen(strip_tags($contact->message)) > 50  ? substr(strip_tags($contact->message), 0, 20).' ...' : strip_tags($contact->message) }}</td>
                            <td>
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action</button>
                                    <div class="dropdown-menu">
                                        <!-- <a class="dropdown-item" href="javascript:voild(0);">Edit</a> -->
                                        <a class="dropdown-item" href="{{route('enquiriesDelete',$contact->id)}}">Delete</a>
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
<script>
    setTimeout(function () {
        $('.hide1').fadeOut('slow');
    }, 1500);

</script>
@endsection
@section('customscript')
@endsection
