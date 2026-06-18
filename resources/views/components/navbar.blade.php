<nav class="tixly-nav" id="navbar">
    <div class="nav-container">

        <a href="{{ url('/') }}" class="nav-logo">
            <span class=""></span>
            TIXLY
        </a>

        <ul class="nav-links">
            <li><a href="{{ route('events.index') }}" class="nav-link">Discover</a></li>
            <li><a href="{{ route('categories') }}" class="nav-link">Categories</a></li>
            <li><a href="{{ route('nearby') }}" class="nav-link">Nearby</a></li>
        </ul>

        <div class="nav-auth">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn-ghost">
                    {{ Str::of(Auth::user()->name)->explode(' ')->first() }}
                </a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <button type="submit" class="btn-ghost">Sign Out</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn-ghost">Sign In</a>
                <a href="{{ route('register') }}" class="btn-primary">Get Tickets</a>
            @endauth
        </div>

        <button class="nav-hamburger" id="hamburgerBtn" aria-label="Open menu">
            <span></span><span></span><span></span>
        </button>

    </div>

    <div class="nav-mobile" id="mobileMenu">
        <a href="{{ route('events.index') }}" class="nav-mobile-link">Discover</a>
        <a href="{{ route('categories') }}" class="nav-mobile-link">Categories</a>
        <a href="{{ route('nearby') }}" class="nav-mobile-link">Nearby</a>
        <div class="nav-mobile-auth">
            @auth
                <a href="{{ url('/dashboard') }}" class="nav-mobile-link">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="nav-mobile-link">Sign In</a>
                <a href="{{ route('register') }}" class="btn-primary" style="margin-top:8px; display:block; text-align:center">Get Tickets</a>
            @endauth
        </div>
    </div>
</nav>