@extends('layouts.main')

@section('header_assets')
    <link rel="stylesheet" href="{{ asset('/assets/css/valve_modeling.css') }}">

    <script src="{{ mix('/assets/js/valve_modeling.js') }}" defer></script>
@endsection

@section('page_content')

    @include('sections.courses.kompas_3d.valve_modeling.top-nav')

    @include('blocks.footer')
    
@endsection