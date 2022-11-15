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
            <ul class="navbar-nav me-auto">
                @foreach (\App\Models\Page::orderBy('order_id')->get() as $page)
                    @if ($page->children->count() > 0)
                        <li class="nav-item me-2 dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ $page->path }}" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $page->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu">
                                @if ($page->is_page)
                                    <li>
                                        <a class="dropdown-item" href="{{ $page->path }}">{{ $page->name }}</a>
                                    </li>
                                @endif
                                @foreach (\App\Models\Page::where('parent_id', $page->id)->orderBy('order_id')->get() as $child)
                                    <li>
                                        <a class="dropdown-item" href="{{ $child->path }}">{{ $child->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif

                    @if ($page->parent_id == 0 && $page->children->count() == 0)
                        <li class="nav-item me-2">
                            <a href="{{ $page->path }}" class="nav-link">{{ $page->name }}</a>
                        </li>
                    @endif
                @endforeach
                <li class="nav-item me-2"><a href="{{ route('contact') }}" class="nav-link">Kontakt</a></li>
            </ul>

            <ul class="navbar-nav">
                @guest
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Log ind</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarUserDropdown" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarUserDropdown">
                            <a class="dropdown-item" href="{{ route('offers.index') }}">
                                Kuponer
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
    </div>
</nav>
