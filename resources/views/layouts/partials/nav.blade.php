<nav class="py-2 bg-light border-bottom">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="/" class="nav-link link-dark px-2 active" aria-current="page">Hjem</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Afdelinger</a></li>
        </ul>
        <ul class="nav">
            @guest
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link link-dark px-2">Log ind</a></li>
                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link link-dark px-2">Registrer</a></li>
            @else
                <li class="nav-item"><a href="{{ route('home') }}"
                        class="nav-link link-dark px-2">{{ auth()->user()->name }}</a></li>
            @endguest
        </ul>
    </div>
</nav>
<header class="py-3 mb-4 border-bottom">
    <div class="container d-flex flex-wrap justify-content-center">
        <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
            <img src="/logo.png" height="50" class="me-3">
            <span class="fs-4">AASI</span>
        </a>
        <form class="col-12 col-lg-auto mb-3 mb-lg-0" role="search">
            <input type="search" class="form-control" placeholder="Søg..." aria-label="Søg">
        </form>
    </div>
</header>
