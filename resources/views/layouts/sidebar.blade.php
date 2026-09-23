<aside class="app-sidebar shadow bg-body" data-bs-theme="light">
    <div class="sidebar-brand">
        <a href="{{ route('home') }}" class="brand-link">
            <span class="brand-text fw-light">Campus Events</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-header">NAVIGATION</li>
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon bi bi-house"></i>
                        <p>Home</p>
                    </a>
                    <a href="{{ route('events.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-calendar"></i>
                        <p>Events</p>
                    </a>
                    <a href="{{ route('login') }}" class="nav-link">
                        <i class="nav-icon bi bi-house"></i>
                        <p>Login</p>
                    </a>
                </li>
                @auth
                    @if (Route::has('dashboard'))
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <i class="nav-icon bi bi-speedometer2"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    @endif
                @endauth
            </ul>
        </nav>
    </div>
</aside>
