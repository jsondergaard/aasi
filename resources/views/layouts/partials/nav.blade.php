<nav class="py-2 bg-light border-bottom">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="/" class="nav-link px-2">Hjem</a></li>
            @foreach (\App\Models\Page::orderBy('order_id')->get() as $page)
                @if ($page->children->count() > 0)
                    <li class="nav-item dropdown">
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

                @if ($page->parent_id == 0 && !$page->children)
                    <li class="nav-item">
                        <a href="{{ $page->path }}" class="nav-link px-2">{{ $page->name }}</a>
                    </li>
                @endif
            @endforeach
            <li class="nav-item"><a href="{{ route('sponsors') }}" class="nav-link px-2">Sponsorer</a></li>
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
</nav>
<header class="py-3 border-bottom">
    <div class="container d-flex flex-wrap justify-content-center">
        <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
            <img src="/logo.png" height="50" class="me-3">
            <span class="fs-4">AASI</span>
        </a>
    </div>
</header>
