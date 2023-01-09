<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">

    <title>Курс по Компас-3D</title>

    <!-- Yandex.Metrika counter -->
    <script>
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

    <noscript>
        <div>
            <img src="https://mc.yandex.ru/watch/90898955" style="position:absolute; left:-9999px;" alt="" />
        </div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
        
    <script>
        @if(session('user_email_referral_hash'))
            window.user_email_referral_hash = '{{ session('user_email_referral_hash') }}';

            ym(90898955, 'getClientID', (clientID) => {
                fetch('/api/save-ym-uid', {
                    method: 'POST',
                    cache: 'no-cache',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    redirect: 'follow',
                    body: JSON.stringify({
                        hash: window.user_email_referral_hash,
                        ym_uid: clientID
                    })
                });
            });
        @endif
    </script>

    @yield('header_assets')

</head>
<body>
    
    @yield('page_content')

    @yield('footer_scripts')
    
</body>
</html>