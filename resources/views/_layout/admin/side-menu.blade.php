<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title text-gray-1 text-space-2">Menu</li>

        <li class="sidebar-item {{ is_page('dashboard') ? 'active' : '' }}">
            <a href="{{ url('admin/dashboard') }}" class="sidebar-link">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item has-sub {{ is_page('example') ? 'active' : '' }}">
            <a href="#" class="sidebar-link">
                <i class="bi bi-menu-app-fill"></i>
                <span>Dropdown Menu</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item active">
                    <a href="">Menu 1</a>
                </li>
                <li class="submenu-item">
                    <a href="">Menu 2</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-title text-gray-1 text-space-2">Example CRUD</li>

        <li class="sidebar-item {{ is_page('user') ? 'active' : '' }}">
            <a href="{{ url('admin/user') }}" class="sidebar-link">
                <i class="bi bi-person"></i>
                <span>Pengguna</span>
            </a>
        </li>

        <hr class="mt-5">

        <div>
            <h6 class="mb-0">{{ Auth::user()->name }}</h6>
            <small class="text-gray-1 text-space-2">{{ Str::ucfirst(strtolower(Auth::user()->access_type)) }}</small>
        </div>

        <li class="sidebar-item">
            <a href="{{ url('auth/logout') }}" class="sidebar-link bg-danger-soft" onclick="return confirm('Apakah kamu yakin?')">
                <i class="bi bi-arrow-bar-left"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</div>
