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
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <a class="navbar-brand" href="{{ url('/') }}">
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

<footer id="footer">
    <div id="copyright">
        
            <div class="row">
             © 2021 Universidad Nacional de Costa Rica. Todos los derechos reservados.
             </div>

             <div class="row">
                Desarrollado por Jefferson Hernández Flores.
            </div>
    </div>

    <div id="contact">
        <div class="row">
            <p>Teléfono de contacto: 2277-3000</p> <br>
        </div>

        <div class="row">
            <p>Redes Sociales:</p>
            <div class="col">
                <a  href="https://www.facebook.com/unacostarica/"><i class="fab fa-facebook"> Facebook</i></a>
                <a  href="https://www.instagram.com/una.ac.cr/?hl=es-la"><i class="fab fa-instagram"> Instagram</i></a>
                <a  href="https://twitter.com/comunidadUNACR?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><i class="fab fa-twitter"> Twitter</i></a>
            </div>
        </div>
    </div>
</footer>
</html>
