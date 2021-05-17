<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UNA') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/d0e8a67f7d.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer-form.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('/favicons/favicon.ico') }}" type="image/x-icon"/>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <a class="navbar-brand" href="#">
                    <img class="navbar-brand"
                        src="https://d1yjjnpx0p53s8.cloudfront.net/styles/logo-thumbnail/s3/062010/unanacional_0.png?itok=EB58UD3N"
                        alt="Logo UNA">
                </a>
                <div class="col-12">
                    <h1><strong>Sistema de Control de Asistencia</strong></h1>
                </div>

            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
</body>
<div class="d-flex flex-column" style="height: 100px; margin-top:3%;">
    @yield('footer')
</div>
</html>
