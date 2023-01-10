@extends('layouts.main')

@section('header_assets')
    <link rel="stylesheet" href="{{ asset('/assets/css/valve_modeling.css') }}?v=4">

    <script src="{{ mix('/assets/js/valve_modeling.js') }}?v=2" defer></script>
@endsection

@section('page_content')

    @include('sections.courses.kompas_3d.valve_modeling.top-nav')

    @include('sections.courses.kompas_3d.valve_modeling.section-start')

    @include('sections.courses.kompas_3d.valve_modeling.section-is-for')

    @include('sections.courses.kompas_3d.valve_modeling.section-format')

    @include('sections.courses.kompas_3d.valve_modeling.section-teacher')

    @include('sections.courses.kompas_3d.valve_modeling.section-program')

    @include('sections.courses.kompas_3d.valve_modeling.section-certificate')

    @include('sections.courses.kompas_3d.valve_modeling.section-enroll')

    @include('sections.courses.kompas_3d.valve_modeling.section-reviews')

    @include('blocks.footer')

    @include('blocks.courses.kompas_3d.valve_modeling.popup-apply-form')
    
@endsection