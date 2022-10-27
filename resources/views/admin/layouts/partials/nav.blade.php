<nav class="py-2 bg-light border-bottom">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="/" class="nav-link link-dark px-2 active me-4" aria-current="page">AASI</a>
            </li>
            @can('view users')
                <li class="nav-item"><a href="{{ route('admin.users.index') }}" class="nav-link link-dark px-2">Brugere</a>
                @endcan
                @can('view sponsors')
                <li class="nav-item"><a href="{{ route('admin.sponsors.index') }}"
                        class="nav-link link-dark px-2">Sponsorer</a>
                </li>
            @endcan
            @can('view pages')
                <li class="nav-item"><a href="{{ route('admin.pages.index') }}" class="nav-link link-dark px-2">Sider</a>
                @endcan
                @can('view roles')
                <li class="nav-item"><a href="{{ route('admin.roles.index') }}" class="nav-link link-dark px-2">Roller</a>
                @endcan
            </li>
        </ul>
        <ul class="nav">
            @guest
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link link-dark px-2">Log ind</a></li>
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

                        <a class="dropdown-item" href="{{ route('settings') }}">
                            Indstillinger
                        </a>

                        @can('view dashboard')
                            <a class="dropdown-item" href="{{ route('admin.home') }}">
                                Administration
                            </a>
                        @endcan

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
