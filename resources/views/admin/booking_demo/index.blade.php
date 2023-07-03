@extends('admin.layouts.master')
@section('demo_select','active')
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
                    <a href="javascript:void(0);" id="sendDemoInvitation" class="btn btn-primary">Send Demo Invitations</a>
                </div>
            </div>
            
            <div class="card-body table-responsive">
                <table class="table table-head-fixed text-nowrap" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col" width="10%">#</th>
                            <th scope="col" width="10%">Course</th>
                            <th scope="col" width="10%">Customer</th>
                            <th scope="col" width="10%">Country</th>
                            <th scope="col" width="10%">TimeZone</th>
                            <th scope="col" width="10%">Date</th>
                            <th scope="col" width="10%">Time</th>
                            <th scope="col" width="10%">Invitation Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($demos as $data)
                        <tr>    
                            <td>{{$data->id}}</td>
                            <td>{{ (!empty($data->course) && $data->course->title != '') ? $data->course->title : 'N/A'}}</td>
                            <td>{{(!empty($data->users)  && $data->users->full_name != '') ? $data->users->full_name : 'N/A'}}</td>
                            <td>{{ (!empty($data->CountryID) && $data->CountryID->country != '') ? $data->CountryID->country : 'N/A'}}</td>
                            <td>{{ (!empty($data->TimeZone) && $data->TimeZone->timezone != '') ? $data->TimeZone->timezone : 'N/A'}}</td>
                            <td>{{$data->date_of_demo}}</td>
                            <td>{{$data->time_of_demo}}</td>
                            <td>{{$data->invitation_link}}</td>
                        </tr>
                        <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="sendDemoInvitationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold">Send Invitation Link</h4>
          <button type="button" class="close close_login" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('sendInvitations')}}" method="post" id="sendInvitationForm">
            {{ csrf_field() }}
            <input type="hidden" value="" name="demo_ids" id="selected_demos">
            <div class="modal-body mx-3">
                <div class="md-form">
                    <input type="text" name="link" id="invitation_link" class="form-control validate" placeholder="Put your link here">
                    <span id="invitationLinkError" class="validation_error"></span>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" id="sendDemoInvitationButton" class="btn buy-btn btn-submit">Send Invite</button>
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
    var selectedDemos = [];
    jQuery(document).on('click', '#sendDemoInvitation', function(){
        var rows_selected = table.column(0).checkboxes.selected();
        jQuery('#sendDemoInvitationModal').modal('show');
        
        $.each(rows_selected, function(key, rowId){
            selectedDemos.push(rowId);
        });
    });
    
    jQuery(document).on('click', '#sendDemoInvitationButton', function(){
        let linkUrl = jQuery('#invitation_link').val();
        let submitForm = true;
        if(linkUrl == ""){
            jQuery('#invitationLinkError').html('Please enter demo link').css('color', 'red');
            submitForm = false;
        } else {
            jQuery('#invitationLinkError').html('');
            submitForm = true;
        }
        if(submitForm){
            let demos = selectedDemos.toString();
            jQuery('#selected_demos').val(demos);
            jQuery('#sendInvitationForm').submit();
        }
    });

    
   // Handle form submission event 
//    $('#frm-example').on('submit', function(e){
//       var form = this;
//       var rows_selected = table.column(0).checkboxes.selected();
//       $.each(rows_selected, function(key, rowId){
//          $(form).append(
//              $('<input>')
//                 .attr('type', 'hidden')
//                 .attr('name', 'id[]')
//                 .val(rowId)
//          );
//          console.log(rowId);
//       });
//       // Prevent actual form submission
//       e.preventDefault();
//    }); 
</script>

@endsection
