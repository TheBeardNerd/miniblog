<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600|Special+Elite&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/6c02b20e8c.js"></script>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Custom Stylesheet -->
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">

        <!-- favicon -->
        <link rel="icon" type="image/ico" href="{{ URL::asset('images/skull-crossbones.ico') }}">

        <!-- Scripts -->
        <script>
            window.App = {!! json_encode([
                'csrfToken' => csrf_token(),
                'user' => Auth::user(),
                'signedIn' => Auth::check()
            ]) !!};
        </script>

    </head>
    <body>

        <div id="app" class="content mar">
            @include('layouts.nav')

            @yield('content')

            <flash message="{{ session('flash') }}"></flash>
        </div>

        <footer id="footer" class="navbar navbar-expand-lg nav-color">
            <div class="container justify-content-center flex-column">
                <div class="footer-links">
                    <a href="https://www.linkedin.com/in/traviswindsorcummings"><i class="fab fa-linkedin-in fa-fw"></i></a>
                    <a href="https://www.facebook.com/traviswindsorcummings"><i class="fab fa-facebook-f fa-fw"></i></a>
                    <a href="https://www.instagram.com/traviswindsorcummings"><i class="fab fa-instagram fa-fw"></i></a>
                    <a href="https://github.com/TheBeardNerd"><i class="fab fa-github fa-fw"></i></a>
                    <a href="https://codepen.io/TravisWindsor-Cummings/"><i class="fab fa-codepen fa-fw"></i></a>
                </div>
                <div class="text-white name-links pt-1">
                    Made with <i class="far fa-heart mx-1 text-success"></i> by
                    <a href="http://travis.windsor-cummings.com">Travis Windsor-Cummings</a>
                </div>
            </div>
        </footer>

        <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>
