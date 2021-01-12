<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/home">Galery+</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                @if (Auth::check() && Auth::user()->level === 'Admin')
                <li
                    class="nav-item @if (Route::currentRouteName() === 'album' ||Route::currentRouteName() === 'album.edit' ||Route::currentRouteName() === 'album.create' ) active @endif">
                    <a class="nav-link" href="/album">Album</a>
                </li>
                @endif

                @if (Auth::check())
                <li
                    class="nav-item @if (Route::currentRouteName() === 'galeri' || Route::currentRouteName() === 'galeri.edit' || Route::currentRouteName() === 'galeri.create' ) active @endif">
                    <a class="nav-link" href="/galeri">Galery Photo</a>
                </li>
                @endif

                @if (Auth::check() && Auth::user()->level === 'Admin')
                <li
                    class="nav-item @if (Route::currentRouteName() === 'user' || Route::currentRouteName() === 'user.edit' || Route::currentRouteName() === 'user.create' ) active @endif">
                    <a class="nav-link" href="/user">Management User</a>
                </li>
                @endif

            </ul>

            <ul class="navbar-nav ml-auto">

                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Hi, {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>

        </div>
    </div>
</nav>
{{-- @dump(Route::currentRouteName()) --}}
{{-- @dump(session('status')) --}}