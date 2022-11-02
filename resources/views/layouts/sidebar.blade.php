<div class="sidebar" data-color="blue" data-image="{{ asset('images/sidebar-1.jpg') }}">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="/admin" class="simple-text">
                Library
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
                <a class="nav-link" href="/admin">
                    <i class="fas fa-chart-pie"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            @if (Auth::user()->role == 0)
                <li
                    class="nav-item {{ request()->is('admin/librarians') || request()->is('admin/librarians/*') ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/librarians">
                        <i class="fas fa-users"></i>
                        <p>Librarians</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->role == 0 || Auth::user()->role == 1)
                <li
                    class="nav-item {{ request()->is('admin/students') || request()->is('admin/students/*') ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/students">
                        <i class="fas fa-users"></i>
                        <p>Students</p>
                    </a>
                </li>
            @endif

            <li class="nav-item {{ request()->is('admin/books') || request()->is('admin/rooms/*') ? 'active' : '' }}">
                <a class="nav-link" href="/admin/books">
                    <i class="fa fa-book"></i>
                    <p>Books</p>
                </a>
            </li>

            <li
                class="nav-item {{ request()->is('admin/burrows') || request()->is('admin/burrows/*') ? 'active' : '' }}">
                <a class="nav-link" href="/admin/burrows">
                    <i class="fas fa-file-signature"></i>
                    <p>Book burrows</p>
                </a>
            </li>
        </ul>
    </div>
</div>
