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
        <div class="border">
            <nav class="navbar navbar-expand-lg nav-color fixed-top">
                <a class="navbar-brand nav-logo" href="#">MiniBlog<span class="text-success ml-1"><i class="far fa-keyboard"></i></span></a>
                <button class="navbar-toggler nav-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars fa-lg"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="navbar-nav links nav-menu mr-auto">
                        <a class="nav-item nav-link" href="/">Home</a>
                        {{-- <a class="nav-item nav-link" href="/contact">Contact</a></a>
                        <a class="nav-item nav-link" href="/about">About</a></a> --}}
                    </div>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav links nav-menu ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item links">
                                <a class="nav-item nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt mr-2 text-success"></i>{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item links">
                                    <a class="nav-item nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus mr-2 text-success"></i>{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item links dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user-cog text-success"></i>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu links text-dark dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-dark" href="/profiles/{{ Auth::user()->id }}">
                                        <i class="far fa-user-circle text-success"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt text-success"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    <div class="navbar-nav">
                        <button type="button" class="btn btn-sm btn-success create">
                            <a class="nav-item nav-link text-decoration-none text-white text-lg" href="/posts/create">
                                Create MiniBlog
                            </a>
                        </button>
                    </div>
                </div>
            </nav>
            <div id="app" class="content mar">
                @yield('content')
            </div>
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
