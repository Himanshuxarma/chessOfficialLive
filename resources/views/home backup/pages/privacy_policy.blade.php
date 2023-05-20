@extends('front.layouts.master')
@section('content')
    <!-- ======= Frequently Asked Questions Section ======= -->
    @php
        $PolicyPage = isset($policy) && !empty($policy->description) ? $policy->description:'';
     @endphp
     
    {{!! $PolicyPage!!}}
   <!-- End Frequently Asked Questions Section -->
    
@endsection