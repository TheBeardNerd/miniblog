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
