<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'modulr') }}</title>

    <link rel="shortcut icon" href="{{ asset('img/icon/favicon.ico') }}" type="image/x-icon"/>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/icon/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/icon/apple-touch-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/icon/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/icon/apple-touch-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/icon/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/icon/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/icon/apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/icon/apple-touch-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/icon/apple-touch-icon-180x180.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/icon/favicon-16x16.png') }}" sizes="16x16">
    <link rel="icon" type="image/png" href="{{ asset('img/icon/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('img/icon/favicon-96x96.png') }}" sizes="96x96">
    <link rel="icon" type="image/png" href="{{ asset('img/icon/android-chrome-192x192.png') }}" sizes="192x192">
    <meta name="msapplication-square70x70logo" content="{{ asset('img/icon/smalltile.png') }}"/>
    <meta name="msapplication-square150x150logo" content="{{ asset('img/icon/mediumtile.png') }}"/>
    <meta name="msapplication-wide310x150logo" content="{{ asset('img/icon/widetile.png') }}"/>
    <meta name="msapplication-square310x310logo" content="{{ asset('img/icon/largetile.png') }}"/>

    <!-- Manifest -->
    <link rel="manifest" href="{{ asset('manifest.json') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'notifications' => (Auth::user()) ? Auth::user()->notifications : [],
            'unReadNotifications' => (Auth::user()) ? Auth::user()->unReadNotifications : [],
        ]) !!};

        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/service-worker.js')
                .then(function(swReg) {
                    console.log('Service Worker is registered', swReg)
                }).catch(function(error) {
                    console.error('Service Worker Error', error)
                });
            })
            window.addEventListener('beforeinstallprompt', function(e) {
                e.userChoice.then(function(choiceResult) {
                    console.log(choiceResult.outcome)
                    if(choiceResult.outcome == 'dismissed') {
                        console.log('User cancelled home screen install')
                    } else {
                        console.log('User added to home screen')
                    }
                });
            })
        }
    </script>
</head>
<body>
    <div id="app">
        @if (!Auth::guest())
            <navbar></navbar>
        @endif
        <div class="content">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
