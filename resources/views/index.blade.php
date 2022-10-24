<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>Курс по Компас-3D</title>

    <link rel="stylesheet" href="{{ asset('/assets/css/app.css')  }}">

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(90898955, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/90898955" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->g
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
@include('sections.section-certificate-another')

@include('blocks.footer')
@include('blocks.footer-md')
@include('blocks.footer-sm')

@include('blocks.popup-apply-form')
</body>
</html>
