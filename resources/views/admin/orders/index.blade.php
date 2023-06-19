@extends('admin.layouts.master')
@section('customstyle')
@endsection
@section('buycourse_select','active')
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
                <div class="card-tools">
                    <a href="javascript:void(0);" id="sendOrderInvitation" class="btn btn-primary">Send Course Invitations</a>
                </div>
                
            </div>
            <div class="card-body table-responsive">
                <table class="table table-head-fixed text-nowrap" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col" width="10%">#</th>
                            <th scope="col" width="10%">Course</th>
                            <th scope="col" width="10%">Course Type</th>
                            <th scope="col" width="10%">Customer</th>
                            <th scope="col" width="10%">Country</th>
                            <th scope="col" width="10%">Price</th>
                            <th scope="col" width="10%">Session Completed</th>
                            <th scope="col" width="10%">Payment</th>
                            <th scope="col" width="10%">Payment Status</th>
                            <th scope="col" width="10%">Status</th>
                            <th scope="col" width="10%">Lock Session</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ (!empty($data->course) && $data->course->title != '') ? $data->course->title : 'N/A'}}</td>
                            <td>{{ !empty($data->course_type) ? str_replace('_',' ', $data->course_type) : 'N/A' }}</td>
                            <td>{{ (!empty($data->CustomerData) && $data->CustomerData->full_name != '') ? $data->CustomerData->full_name : 'N/A'}}</td>
                            <td>{{ (!empty($data->CountryID) && $data->CountryID->country != '') ? $data->CountryID->country : 'N/A'}}</td>
                            <td>{{ $data->price ? $data->price : 0 }}</td>
                            <td>{{ $data->session_completed ? $data->session_completed : 0 }}</td>
                            <td>{{ (!empty($data->payment_id) && $data->payment_id != '') ? $data->payment_id : 'N/A'}}</td>
                            <td>{{ (!empty($data->payment_status) && $data->payment_status != '') ? $data->payment_status : 'N/A'}}</td>
                            @if($data->status == "1")
                            <td class="project-state">
                                <a href="javascript:void(0);"><span class="badge badge-success">Active</span></a>
                            </td>
                            @else
                            <td class="project-state">
                                <a href="javascript:void(0);"><span class="badge badge-danger">Inactive</span></a>
                            </td>
                            @endif
                            <td class="project-state">
                                <a href="{{route('lockSession', $data->id)}}"><button class="btn btn-warning" <?php if($data->session_completed == $data->class_count){ ?>disabled="disabled" <?php } ?>>Lock Session</button></a>
                            </td>
                            <!-- <td>
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-default dropdown-toggle"
                                        data-toggle="dropdown"> Action</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('faqsEdit',$data->id) }}">Edit</a>
                                        <a class="dropdown-item" href="{{ route('faqsDelete',$data->id) }}">Delete</a>
                                    </div>
                                </div>
                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="sendOrderInvitationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold">Send Invitation Link</h4>
          <button type="button" class="close close_login" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('sendOrderInvitations')}}" method="post" id="sendInvitationForm">
            {{ csrf_field() }}
            <input type="hidden" value="" name="order_ids" id="selected_orders">
            <div class="modal-body mx-3">
                <div class="md-form">
                    <input type="text" name="link" id="invitation_link" class="form-control validate" placeholder="Put your link here">
                    <span id="invitationLinkError" class="validation_error"></span>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" id="sendOrderInvitationButton" class="btn buy-btn btn-submit">Send Invite</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@section('customscript')
<script>
    setTimeout(function () {
        $('.hide1').fadeOut('slow');
    }, 5000);
    
    var table = $('#myTable').DataTable({
        'columnDefs': [{
            'targets': 0,
            'checkboxes': {
            'selectRow': true
            }
        }],
    });
    var selectedOrders = [];
    jQuery(document).on('click', '#sendOrderInvitation', function(){
        var rows_selected = table.column(0).checkboxes.selected();
        jQuery('#sendOrderInvitationModal').modal('show');
        
        $.each(rows_selected, function(key, rowId){
            selectedOrders.push(rowId);
        });
    });
    
    jQuery(document).on('click', '#sendOrderInvitationButton', function(){
        let linkUrl = jQuery('#invitation_link').val();
        let submitForm = true;
        if(linkUrl == ""){
            jQuery('#invitationLinkError').html('Please enter Order link').css('color', 'red');
            submitForm = false;
        } else {
            jQuery('#invitationLinkError').html('');
            submitForm = true;
        }
        if(submitForm){
            let orders = selectedOrders.toString();
            jQuery('#selected_orders').val(orders);
            jQuery('#sendInvitationForm').submit();
        }
    });

</script>

@endsection
