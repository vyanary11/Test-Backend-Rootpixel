<aside id="sidebar-wrapper" class="pb-5">
    <div class="sidebar-brand">
        <a href="">{{ config('app.name') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">{{ strtoupper(substr(config('app.name'), 0, 2)) }}</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/dashboard') }}"><i class="fas fa-columns"></i> <span>Dashboard</span></a>
        </li>

        <li class="menu-header">Layanan</li>
        <li class="{{ request()->is('dashboard/blog') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard.blog') }}"><i class="fas fa-newspaper"></i> <span>Blogs</span></a>
        </li>

        <li class="menu-header">Data Master</li>
        {{-- <li class="{{ request()->is('dashboard/categories') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard.categories') }}"><i class="fas fa-money-bill-wave"></i> <span>Categories</span></a>
        </li> --}}
        <li class="{{ request()->is('dashboard/user') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard.user') }}"><i class="fas fa-users"></i> <span>Users</span></a>
        </li>

        <li class="menu-header">Pengaturan</li>
        <li class="{{ request()->is('dashboard/profile') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard.profile') }}"><i class="fas fa-user-circle"></i> <span>Profile</span></a>
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="nav-link" href="#" onclick="event.preventDefault();this.closest('form').submit();">
                    <i class="fas fa-sign-out-alt"></i><span>Logout</span>
                </a>
            </form>
        </li>
    </ul>
</aside>

