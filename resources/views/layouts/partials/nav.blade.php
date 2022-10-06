<nav class="py-2 bg-light border-bottom">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="/" class="nav-link px-2">Hjem</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Afdelinger
                </a>
                <ul class="dropdown-menu dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('activities.badminton') }}">Badminton</a></li>
                    <li><a class="dropdown-item" href="{{ route('activities.soccer') }}">Fodbold</a></li>
                    <li><a class="dropdown-item" href="{{ route('activities.handball') }}">Håndbold</a></li>
                    <li><a class="dropdown-item" href="{{ route('activities.volley') }}">Volley</a></li>
                    <li><a class="dropdown-item" href="{{ route('activities.swimming') }}">Svømning</a></li>
                </ul>
            </li>
            <li class="nav-item"><a href="{{ route('sponsors') }}" class="nav-link px-2">Sponsorer</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Om os
                </a>
                <ul class="dropdown-menu dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('about-us') }}">Omkring os</a></li>
                    <li><a class="dropdown-item" href="{{ route('by-laws') }}">Vedtægter</a></li>
                </ul>
            </li>
            <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link px-2">Kontakt</a></li>
        </ul>
        <ul class="nav">
            @guest
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link px-2">Log ind</a></li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarUserDropdown" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <div class="d-inline-block">{{ auth()->user()->name }} <span class="caret"></span>
                        </div>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarUserDropdown">
                        <a class="dropdown-item" href="{{ auth()->user()->path }}">
                            Min profil
                        </a>

                        <hr>

                        <a class="dropdown-item" href="{{ route('users.settings') }}">
                            Indstillinger
                        </a>

                        <a class="dropdown-item" href="{{ route('users.subscription') }}">
                            Medlemskab
                        </a>

                        @if (auth()->user()->isAdmin)
                            <a class="dropdown-item" href="{{ route('admin.home') }}">
                                Administration
                            </a>
                        @endif

                        <hr>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                            Log ud
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
<header class="py-3 border-bottom">
    <div class="container d-flex flex-wrap justify-content-center">
        <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
            <img src="/logo.png" height="50" class="me-3">
            <span class="fs-4">AASI</span>
        </a>
    </div>
</header>
