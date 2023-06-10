@extends('front.layouts.master')
@section('content') 
@php 
    $countryId = 6;
    if(session()->has('SiteCountry')){
        $countryId = session()->get('SiteCountry');
    }
    $countryDetails = App\Helpers\Helper::getCountryData($countryId); 
@endphp
<div id="topOfPage" class="topTabsWrap">
    <div class="main">
        <div class="speedBar">
            <a class="home" href="index.html">Home</a>
            <span class="breadcrumbs_delimiter">
                <i class="icon-right-open-mini"></i>
            </span>
            <a class="all" href="{{route('front.dashboard')}}">Dashboard</a>
            <span class="breadcrumbs_delimiter">
                <i class="icon-right-open-mini"></i>
            </span>
            <span class="current">User Dashboard</span>
        </div>
        <h3 class="pageTitle h3">User Dashboard</h3>
    </div>
</div>

<div class="mainWrap without_sidebar">
    <div class="main">
        <div class="content">
            <section class="no_margin no_padding">
                    <div class="masonryWrap">
                        <ul class="profile-menus">
                            <li class="squareButton active">
                                <a href="javascript:void(0);" class="profile-tabs" data-filter="user_information">User Profile</a>
                            </li>
                            <li class="squareButton">
                                <a href="javascript:void(0);" class="profile-tabs" data-filter="user_information_edit">Edit Profile</a>
                            </li>
                            <li class="squareButton">
                                <a href="javascript:void(0);" class="profile-tabs" data-filter="change_password">Change Password</a>
                            </li>
                            <li class="squareButton">
                                <a href="javascript:void(0);" class="profile-tabs" data-filter="demo_orders_listing">Demos</a>
                            </li>
                            <li class="squareButton">
                                <a href="javascript:void(0);" class="profile-tabs" data-filter="buy_orders_listing">Purchased Courses</a>
                            </li>
                        </ul>
                        <section data-columns="5">
                            <div class="post_format_standard user_information" id="user_information">
                                <div class="container">
                                    <div class="user-dashboard sc_columns">
                                        <div class="sc_column_item">
                                            <div class="sc_contact_form sc_contact_form_contact">
                                                <h2 class="title">
                                                    User Information
                                                </h2>
                                                <form class="contact_1" method="post" action="{{route('contactsSave')}}">
                                                    @csrf
                                                    <div class="columnsWrap">
                                                        <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                                            <label for="full_name"><i class="fa fa-user"></i> Full Name</label>
                                                            <input type="text" class="form-control" id="full_name" name="full_name" value="{{$customer->full_name}}" readonly>
                                                        </div>
                                                        <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                                            <label for="full_name"><i class="fa fa-user"></i> Date Of Birth</label>
                                                            <input type="text" class="form-control" id="date_of_birth" name="dob" value="{{$customer->dob}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="columnsWrap">
                                                        <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                                            <label for="show_email"><i class="fa fa-envelope"></i> Email</label>
                                                            <input type="text" class="form-control" id="show_email" name="email" value="{{$customer->email}}"  readonly>
                                                        </div>
                                                        <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                                            <label for="phone"><i class="fa fa-phone"></i> Phone</label>
                                                            <input type="text" class="form-control" id="phone" name="phone" value="{{$customer->phone}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="columnsWrap">
                                                        <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                                            <label for="Country" class="col-form-label">Country</label>
                                                            <input name="country" type="text" class="form-control" id="Country" value="{{$customer->country}}" readonly>
                                                        </div>
                                                        <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                                            <label for="state"><i class="fa fa-envelope"></i> State</label>
                                                            <input type="text" class="form-control" id="state" name="state" value="{{$customer->state}}"  readonly>
                                                        </div>
                                                    </div>
                                                    <div class="columnsWrap">
                                                        <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                                            <label for="city"><i class="fa fa-city"></i> City</label>
                                                            <input type="text" class="form-control" id="city" name="city" value="{{$customer->city}}" readonly>
                                                        </div>
                                                        <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                                            <label for="address"><i class="fa fa-envelope"></i> Address</label>
                                                            <input type="text" class="form-control" id="address" name="address" value="{{$customer->address}}"  readonly>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="post_format_standard user_information_edit d-none" id="user_information_edit">
                                <div class="container">
                                    <div class="user-dashboard sc_columns">
                                        <div class="sc_column_item">
                                            <div class="sc_contact_form sc_contact_form_contact">
                                                <h2 class="title">
                                                    Edit User Profile
                                                </h2>
                                                <form class="contact_1" method="post" action="{{route('profile.Update')}}">
                                                    @csrf
                                                    <input type="hidden" name="customer_id" value="{{$customer->id}}">
                                                    <div class="columnsWrap">
                                                        <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                                            <label for="edit_full_name" class="col-form-label">Full Name</label>
                                                            <input name="full_name" type="text" class="form-control" id="edit_full_name" value="{{$customer->full_name}}">
                                                            @if ($errors->has('full_name'))
                                                                <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                                            <label for="email" class="col-form-label">Email</label>
                                                            <input name="email" type="text" class="form-control" id="email" value="{{$customer->email}}">
                                                            @if ($errors->has('email'))
                                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="columnsWrap">
                                                        <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                                            <label for="edit_phone" class="col-form-label">Phone</label>
                                                            <input name="phone" type="text" class="form-control" id="edit_phone" value="{{$customer->phone}}">
                                                            @if ($errors->has('phone'))
                                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                                            <label for="edit_date_of_birth"><i class="fa fa-user"></i> Date Of Birth</label>
                                                            <input type="text" class="form-control" id="edit_date_of_birth" name="dob" value="{{$customer->dob}}">
                                                            @if ($errors->has('dob'))
                                                                <span class="text-danger">{{ $errors->first('dob') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="columnsWrap">
                                                        <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                                            <label for="edit_country_id"><i class="fa fa-globe"></i> Country</label>
                                                            <select id="edit_country_id" class="form-control" name="country">
                                                                <option value="">--Select Country--</option>
                                                                @foreach($country as $data)
                                                                    <option value="{{$data->country}}" <?php if($customer->country && $customer->country == $data->country){ echo 'selected="selected"'; } ?> >{{ $data->country }}</option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('country'))
                                                                <span class="text-danger">{{ $errors->first('country') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                                            <label for="edit_state"><i class="fa fa-envelope"></i> State</label>
                                                            <input type="text" class="form-control" id="edit_state" name="state" value="{{$customer->state}}">
                                                            @if ($errors->has('state'))
                                                                <span class="text-danger">{{ $errors->first('state') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="columnsWrap">
                                                        <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                                            <label for="edit_city"><i class="fa fa-city"></i> City</label>
                                                            <input type="text" class="form-control" id="edit_city" name="city" value="{{$customer->city}}">
                                                            @if ($errors->has('city'))
                                                                <span class="text-danger">{{ $errors->first('city') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                                            <label for="edit_address"><i class="fa fa-envelope"></i> Address</label>
                                                            <input type="text" class="form-control" id="edit_address" name="address" value="{{$customer->address}}">
                                                            @if ($errors->has('address'))
                                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                                                @endif
                                                        </div>
                                                    </div>
                                                    <div class="columnsWrap">
                                                        <div class="sc_button sc_button_style_light sc_button_size_huge alignright squareButton light huge">
                                                            <button type="submit" class="btn btn-warning fright mt-4">Save Changes</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="post_format_standard change_password d-none" id="change_password">
                                <div class="container">
                                    <div class="user-dashboard sc_columns">
                                        <div class="sc_column_item">
                                            <div class="sc_contact_form sc_contact_form_contact">
                                                <h2 class="title">
                                                    Change Password
                                                </h2>
                                                <form class="contact_1" method="post" action="{{route('contactsSave')}}">
                                                    @csrf
                                                    <div class="columnsWrap">
                                                        <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                                            <label for="password"><i class="fa fa-user"></i> Password</label>
                                                            <input type="password" class="form-control" id="password" name="password">
                                                            @if ($errors->has('password'))
                                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="columns1_2 margin_top_mini margin_bottom_mini">
                                                            <label for="confirm_password"><i class="fa fa-envelope"></i> Confirm Password</label>
                                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                                                            @if ($errors->has('confirm_password'))
                                                            <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="columnsWrap">
                                                        <div class="sc_button sc_button_style_light sc_button_size_huge alignright squareButton light huge">
                                                            <button type="submit" class="btn btn-warning fright mt-4">Save Changes</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>              
                            <div class="post_format_standard demo_orders_listing d-none" id="demo_orders_listing">
                                <div class="container">
                                    <div class="user-dashboard sc_columns">
                                        <div class="sc_column_item">
                                            <div class="sc_contact_form sc_contact_form_contact">
                                                <div class="d-flex">
                                                    <h2 class="title">Demo Orders</h2>
                                                    <div class="sc_button sc_button_style_light alignright squareButton light ico">
                                                        @if(count($demos) > 0)
                                                            <a href="{{route('courseList')}}" class="btn btn-warning">Book Another Demo</a>
                                                        @else 
                                                            <a href="{{route('courseList')}}" class="btn btn-warning">Let's Book A Demo</a>    
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="card-body table-responsive">
                                                    <table class="table table-head-fixed text-nowrap" id="myTable">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" width="5%"><strong>#</strong></th>
                                                                <th scope="col" width="15%"><strong>Course</strong></th>
                                                                <th scope="col" width="10%"><strong>Customer</strong></th>
                                                                <th scope="col" width="10%"><strong>Country</strong></th>
                                                                <th scope="col" width="15%"><strong>TimeZone</strong></th>
                                                                <th scope="col" width="10%"><strong>Date</strong></th>
                                                                <th scope="col" width="5%"><strong>Time</strong></th>
                                                                <th scope="col" width="30%"><strong>Invitation Link</strong></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if($demos)
                                                                @foreach ($demos as $data)
                                                                <tr>
                                                                    <td  style="text-align: center">{{ $data->id }}</td>
                                                                    <td  style="text-align: center">{{ (!empty($data->course) && $data->course->title != '') ? $data->course->title : 'N/A'}} </td>
                                                                    <td  style="text-align: center">{{(!empty($data->users)  && $data->users->full_name != '') ? $data->users->full_name : 'N/A'}}</td>
                                                                    <td  style="text-align: center">{{ (!empty($data->CountryID) && $data->CountryID->country != '') ? $data->CountryID->country : 'N/A'}} </td>
                                                                    <td  style="text-align: center">{{ (!empty($data->TimeZone) && $data->TimeZone->timezone != '') ? $data->TimeZone->timezone : 'N/A'}}</td>
                                                                    <td  style="text-align: center">{{ (!empty($data->date_of_demo) && $data->date_of_demo != '') ? $data->date_of_demo : 'N/A'}} </td>
                                                                    <td  style="text-align: center">{{ (!empty($data->time_of_demo) && $data->time_of_demo != '') ? $data->time_of_demo : 'N/A'}} </td>
                                                                    <td  style="text-align: center" class=""><a target="_blank" href="{{$data->invitation_link ? $data->invitation_link : 'javascript:void(0);'}}">{{$data->invitation_link ? $data->invitation_link : "Hey there, you'll get the link soon !"}}</a></td>
                                                                </tr>
                                                                @endforeach
                                                            @else 
                                                            <tr>
                                                                <td colspan="8" style="text-align:center">Opps ! No bookings available yet.</td>
                                                            </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="post_format_standard buy_orders_listing d-none" id="buy_orders_listing">
                                <div class="container">
                                    <div class="user-dashboard sc_columns">
                                        <div class="sc_column_item">
                                            <div class="sc_contact_form sc_contact_form_contact">
                                                <h2 class="title">
                                                    Buy Orders
                                                </h2>
                                                <div class="card-body table-responsive">
                                                    <table class="table table-head-fixed text-nowrap" id="myTable">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" width="5%"><strong>#</strong></th>
                                                                <th scope="col" width="15%"><strong>Course</strong></th>
                                                                <th scope="col" width="10%"><strong>Student Name</strong></th>
                                                                <th scope="col" width="10%"><strong>Country</strong></th>
                                                                <th scope="col" width="15%"><strong>TimeZone</strong></th>
                                                                <th scope="col" width="10%"><strong>Date</strong></th>
                                                                <th scope="col" width="10%"><strong>Time</strong></th>
                                                                <th scope="col" width="25%"><strong>Invitation</strong></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(count($orders) > 0)
                                                                @foreach ($orders as $data)
                                                                <tr>
                                                                    <td  style="text-align: center">{{ $data->id }}</td>
                                                                    <td  style="text-align: center">{{ (!empty($data->course) && $data->course->title != '') ? $data->course->title : 'N/A'}} </td>
                                                                    <td  style="text-align: center">{{(!empty($data->users)  && $data->users->full_name != '') ? $data->users->full_name : 'N/A'}}</td>
                                                                    <td  style="text-align: center">{{ (!empty($data->CountryID) && $data->CountryID->country != '') ? $data->CountryID->country : 'N/A'}} </td>
                                                                    <td  style="text-align: center">{{ (!empty($data->TimeZone) && $data->TimeZone->timezone != '') ? $data->TimeZone->timezone : 'N/A'}}</td>
                                                                    <td  style="text-align: center">{{ (!empty($data->date_of_demo) && $data->date_of_demo != '') ? $data->date_of_demo : 'N/A'}} </td>
                                                                    <td  style="text-align: center">{{ (!empty($data->time_of_demo) && $data->time_of_demo != '') ? $data->time_of_demo : 'N/A'}} </td>
                                                                    <td  style="text-align: center" class=""><a href="{{$data->invitation_link ? $data->invitation_link : 'javascript:void(0);'}}">Check Invitation Link</a></td>
                                                                </tr>
                                                                @endforeach
                                                            @else 
                                                                <tr>
                                                                    <td colspan="11" style="text-align:center">Opps ! No bookings available yet.</td>
                                                                </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
            </section>
        </div>
    </div>
</div>
@endsection
@section('customscript')
<script>
    jQuery('.profile-tabs').on('click', function(){
        jQuery('.profile-tabs').parent().removeClass('active');
        jQuery(this).parent().addClass('active');
        let openTab = jQuery(this).data('filter');
        jQuery('.post_format_standard').addClass('d-none');
        jQuery('#'+openTab).removeClass('d-none');
        // jQuery("section").css('height', 'auto');
    });
</script>
@endsection