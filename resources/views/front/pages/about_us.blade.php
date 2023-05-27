@extends('front.layouts.master')
@section('content')
    <!-- ======= About Us  Section ======= -->
    @php
        $aboutUsPage = isset($aboutUs) && !empty($aboutUs->description) ? $aboutUs->description:'';
     @endphp
     
    {{!! $aboutUsPage!!}}
   <!-- End About Us Section -->
    
@endsection