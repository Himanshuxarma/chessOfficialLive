@extends('admin.layouts.master')
@section('customstyle')
@endsection
@section('dashboard_select','active')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info success">
                    <div class="inner">
                        <h3 style="padding:3px;"> 
                        <?php
                             $today_enquiry=0;
                             $created_at=date("Y-m-d");
                            foreach($enquiry as $data){
                                $newdate = new DateTime($data->created_at);
                                $db_date= $newdate->format('Y-m-d'); 
                            if($db_date==$created_at){
                                 $today_enquiry++;
                    }
                }
                
                echo $today_enquiry;
                       ?>
                        </h3>
                        <h4>Today Enquiry</h4>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{count($enquiry)}}<sup style="font-size: 20px"></sup></h3>
                        <p> Total Contact Enquiry</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-address-book"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$settings}}</h3>
                        <p>Settings </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cog"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-secondary">
                <div class="inner">
                        <h3 style="padding:3px;"> 
                        <?php
                             $today_demo_booking=0;
                             $created_at=date("Y-m-d");
                            foreach($demoBooking as $data){
                                $newdate = new DateTime($data->created_at);
                                $db_date= $newdate->format('Y-m-d'); 
                            if($db_date==$created_at){
                                 $today_demo_booking++;
                    }
                }
                
                echo $today_demo_booking;
                       ?>
                        </h3>
                        <h4>Today Demo Booking</h4>
                    </div>
                    <div class="icon">
                        <i class="fa fa-book"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{count($demoBooking)}}</h3>
                        <p>Total Demo Booking </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-book"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                <div class="inner">
                        <h3 style="padding:3px;"> 
                        <?php
                             $today_orders=0;
                             $created_at=date("Y-m-d");
                            foreach($orders as $data){
                                $newdate = new DateTime($data->created_at);
                                $db_date= $newdate->format('Y-m-d'); 
                            if($db_date==$created_at){
                                 $today_orders++;
                    }
                }
                
                echo $today_orders;
                       ?>
                        </h3>
                        <h4>Today Orders</h4>
                    </div>
                    <div class="icon">
                        <i class="fab fa-first-order"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{count($orders)}}</h3>
                        <p>Total Orders </p>
                    </div>
                    <div class="icon">
                        <i class="fab fa-first-order"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            


        </div>
</section>

@endsection
@section('customscript')
@endsection
