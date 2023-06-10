@extends('front.layouts.dashboardMaster')
@section('content')
<div class="pagetitle">
    <h1>Demo Booking</h1>
</div><!-- End Page Title -->

<section class="section profile">
    <div class="row">

        <div class="col-xl-12">

            <div class="card">
                <div class="card-body pt-4">
                    <div class="card-body table-responsive">
                        <table class="table table-head-fixed text-nowrap" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col" width="20%">#</th>
                                    <th scope="col" width="20%">Course</th>
                                    <th scope="col" width="20%">Customer</th>
                                    <th scope="col" width="20%">Country</th>
                                    <th scope="col" width="20%">TimeZone</th>
                                    <th scope="col" width="20%">Date</th>
                                    <th scope="col" width="20%">Time</th>
                                    <th scope="col" width="20%">Invitation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($demos as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ (!empty($data->course) && $data->course->title != '') ? $data->course->title : 'N/A'}} </td>
                                    <td>{{(!empty($data->users)  && $data->users->full_name != '') ? $data->users->full_name : 'N/A'}}</td>
                                    <td>{{ (!empty($data->CountryID) && $data->CountryID->country != '') ? $data->CountryID->country : 'N/A'}} </td>
                                    <td>{{ (!empty($data->TimeZone) && $data->TimeZone->timezone != '') ? $data->TimeZone->timezone : 'N/A'}}</td>
                                    <td>{{ (!empty($data->date_of_demo) && $data->date_of_demo != '') ? $data->date_of_demo : 'N/A'}} </td>
                                    <td>{{ (!empty($data->time_of_demo) && $data->time_of_demo != '') ? $data->time_of_demo : 'N/A'}} </td>
                                    <td class=" "><a href="{{$data->invitation_link}}">{{$data->invitation_link}}</a></td>
                                    

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
              </div>

        </div>
    </div>

    </div>
    </div>
</section>
@endsection

