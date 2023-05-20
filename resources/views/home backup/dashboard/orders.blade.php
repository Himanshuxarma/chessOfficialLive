@extends('front.layouts.dashboardMaster')
@section('content')
<div class="pagetitle">
    <h1>Orders</h1>
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
                                        <th scope="col" width="20%">Course Type</th>
                                        <th scope="col" width="20%">Customer</th>
                                        <th scope="col" width="20%">Country</th>
                                        <th scope="col" width="20%">TimeZone</th>
                                        <th scope="col" width="20%">Offer</th>
                                        <th scope="col" width="20%">Price</th>
                                        <th scope="col" width="20%">Payment</th>
                                        <th scope="col" width="20%">Payment Status</th>
                                        <th scope="col" width="20%">Invitation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ (!empty($data->course) && $data->course->title != '') ? $data->course->title : 'N/A'}}
                                        </td>
                                        <td>{{ $data->course_type }}</td>
                                        <td>{{(!empty($data->users)  && $data->users->full_name != '') ? $data->users->full_name : 'N/A'}}</td>
                                        <td>{{ (!empty($data->CountryID) && $data->CountryID->country != '') ? $data->CountryID->country : 'N/A'}}
                                        </td>
                                        <td>{{ (!empty($data->TimeZone) && $data->TimeZone->timezone != '') ? $data->TimeZone->timezone : 'N/A'}}
                                        </td>
                                        <td>{{ (!empty($data->order_id) && $data->order_id != '') ? $data->order_id : 'N/A'}}
                                        </td>
                                        <td>{{ $data->price }}</td>
                                        <td>{{ (!empty($data->payment_id) && $data->payment_id != '') ? $data->payment_id : 'N/A'}}
                                        </td>
                                        <td>{{ (!empty($data->payment_status) && $data->payment_status != '') ? $data->payment_status : 'N/A'}}
                                        </td>
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

