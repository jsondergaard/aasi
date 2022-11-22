<nav class="navbar navbar-expand-md navbar-dark" style="background-color:#061732;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="/logo.png" height="32" class="me-1">
            <span class="fs-4">AASI</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">
                @can('view dashboard')
                    <li class="nav-item">
                        <a href="{{ route('admin.home') }}" class="nav-link me-2">Hjem</a>
                    </li>
                @endcan
                @can('view users')
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}" class="nav-link me-2">Brugere</a>
                    </li>
                @endcan
                @can('view sponsors')
                    <li class="nav-item">
                        <a href="{{ route('admin.sponsors.index') }}" class="nav-link me-2">Sponsorer</a>
                    </li>
                @endcan
                @can('view pages')
                    <li class="nav-item">
                        <a href="{{ route('admin.pages.index') }}" class="nav-link me-2">Sider</a>
                    </li>
                @endcan
                @can('view roles')
                    <li class="nav-item">
                        <a href="{{ route('admin.roles.index') }}" class="nav-link me-2">Roller</a>
                    </li>
                @endcan
                @can('view departments')
                    <li class="nav-item">
                        <a href="{{ route('admin.departments.index') }}" class="nav-link me-2">Afdelinger</a>
                    </li>
                @endcan
                @can('view statistics')
                    <li class="nav-item">
                        <a href="{{ route('admin.statistics.index') }}" class="nav-link me-2">Statistik</a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</nav>
