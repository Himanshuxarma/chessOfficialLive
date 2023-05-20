@extends('front.layouts.master')
@section('content')
    <!-- ======= Frequently Asked Questions Section ======= -->
    @php
        $TermsConditions = isset($terms_conditions) && !empty($terms_conditions->description) ? $terms_conditions->description:'';
    @endphp
    {{!! $TermsConditions !!}}
   <!-- End Frequently Asked Questions Section -->
    
@endsection