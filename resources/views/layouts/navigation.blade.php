<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
                <x-application-logo class="d-inline h-100 w-auto align-middle" style="height: 2rem;" />
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                {{ __('Dashboard') }}
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ms-auto">
        <!-- User Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                aria-expanded="false">
                <span class="me-2">{{ Auth::user()->name }}</span>
                <i class="fas fa-user"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="fas fa-user-cog me-2"></i> {{ __('Profile') }}
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt me-2"></i> {{ __('Log Out') }}
                        </button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
