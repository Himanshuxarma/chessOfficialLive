@extends('front.layouts.master')
@section('content')
    <!-- ======= About Us  Section ======= -->
    @php
        $chessOfficialAcademyPage = isset($chessOfficialAcademy) && !empty($chessOfficialAcademy->description) ? $chessOfficialAcademy->description:'';
    @endphp
    
    {!! $chessOfficialAcademyPage !!}
   <!-- End About Us Section -->
    
@endsection