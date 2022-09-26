<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <link rel="stylesheet" href="{{ asset('/assets/css/app.css')  }}">

    <script src="{{ mix('/assets/js/app.js') }}" defer></script>
</head>
<body>
    @include('sections.top-nav')

    @include('sections.section-start')

    @include('sections.section-is-for')

    @include('sections.section-format')

    @include('sections.section-program')

    @include('sections.section-teacher')

    @include('sections.section-price')

    @include('sections.section-reviews')

    @include('sections.section-certificate')

    @include('blocks.footer')

    @include('blocks.popup-apply-form')
</body>
</html>
