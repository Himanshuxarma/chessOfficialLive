@extends('front.layouts.master')
@section('content')
    <!-- ======= Frequently Asked Questions Section ======= -->
    @php
        $GuidelinesDescription = isset($guidelines) && !empty($guidelines->description) ? $guidelines->description:'';
    @endphp
    {{!! $GuidelinesDescription !!}}
   <!-- End Frequently Asked Questions Section -->
    
@endsection