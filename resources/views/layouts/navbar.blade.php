<nav class="app-header navbar navbar-expand bg-body" id="navigation" tabindex="-1">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button" aria-label="Toggle sidebar">
                    <i class="bi bi-list"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="#" data-lte-toggle="fullscreen" aria-label="Toggle fullscreen">
                    <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                    <i data-lte-icon="minimize" class="bi bi-fullscreen-exit d-none"></i>
                </a>
            </li>
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <span class="d-none d-md-inline">{{ auth()->user()->name ?? 'Guest' }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    @auth
                        @if (Route::has('dashboard'))
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                        @endif
                        <li><hr class="dropdown-divider"></li>
                        @if (Route::has('logout'))
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Sign out</button>
                                </form>
                            </li>
                        @endif
                    @else
                        @if (Route::has('login'))
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                        @endif
                    @endauth
                </ul>
            </li>
        </ul>
    </div>
</nav>
