<!DOCTYPE html>

<head>
    <title>Registro de Asistencia a {{$form->title}}</title>

    @yield('css')

    <style>
        html {
            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
        }

        @page {
            margin-top: 6.5cm;
            margin-bottom: 2.5cm;

            margin-left: 3cm;
            margin-right: 3cm;
        }

        header {
            position: fixed;
            text-align: center;
            top: -5.25cm;
        }

        footer {
            position: fixed;
            text-align: right;
            margin-right: -3cm;
            bottom: 0cm
        }

        .header-logo {
            width: 155px;
            height: 118px;
            position: absolute;
            margin-left: 1cm;
        }

        .header-title {
            text-align: right;
            margin-top: 2.2cm;
            font-size: 20px
        }

        .divider {
            height: 2px;
            background-color: rgb(197, 51, 51);
            border: rgb(197, 51, 51);
        }

        .linea {
            width: 90%;
            height: 70px;
        }



    </style>
</head>

<body>
    <header>
        <img class="header-logo" src="https://www.perezzeledon.net/wp-content/uploads/logo-una.png"> 

        <h3 class="header-title">
            Sistema de Control de Asistencia
        </h3>

        <hr class="divider">

    </header>

    <main>
        @yield('content')
    </main>

    @yield('js')
</body>

</html>
