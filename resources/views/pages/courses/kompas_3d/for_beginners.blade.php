@extends('layouts.main')

@section('header_assets')
    <link rel="stylesheet" href="{{ asset('/assets/css/for_beginners.css') }}?v=1667896207">

    <script src="{{ mix('/assets/js/for_beginners.js') }}?v=1667896207" defer></script>
@endsection

@section('page_content')

    @include('sections.courses.kompas_3d.for_beginners.top-nav')

    @include('sections.courses.kompas_3d.for_beginners.section-start')

    @include('sections.courses.kompas_3d.for_beginners.section-is-for')

    @include('sections.courses.kompas_3d.for_beginners.section-format')

    @include('sections.courses.kompas_3d.for_beginners.section-program')

    @include('sections.courses.kompas_3d.for_beginners.section-teacher')

    @include('sections.courses.kompas_3d.for_beginners.section-price')

    @include('sections.courses.kompas_3d.for_beginners.section-reviews')

    @include('sections.courses.kompas_3d.for_beginners.section-certificate')
    @include('sections.courses.kompas_3d.for_beginners.section-certificate-another')

    @include('blocks.footer')

    @include('blocks.courses.kompas_3d.for_beginners.popup-apply-form')
    
@endsection