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
            {{-- <li class="nav-item {{ request()->is('admin/guests') || request()->is('admin/guests/*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/guests">
                <i class="fas fa-users"></i>
                <p>Guests</p>
            </a>
            </li> --}}
            <li class="nav-item {{ request()->is('admin/books') || request()->is('admin/rooms/*') ? 'active' : '' }}">
                <a class="nav-link" href="/admin/books">
                    <i class="fa fa-book"></i>
                    <p>Books</p>
                </a>
            </li>
            {{-- <li
                class="nav-item {{ request()->is('admin/bookings') || request()->is('admin/bookings/*') ? 'active' : '' }}">
                <a class="nav-link" href="/admin/bookings">
                    <i class="fas fa-file-signature"></i>
                    <p>Bookings</p>
                </a>
            </li> --}}
            {{-- <li class="nav-item {{ request()->is('admin/food') || request()->is('admin/food/*') ? 'active' : '' }}">
                <a class="nav-link" href="/admin/food">
                    <i class="fas fa-utensils"></i>
                    <p>Food menu</p>
                </a>
            </li> --}}
            {{-- <li
                class="nav-item {{ request()->is('admin/food-order') || request()->is('admin/food-order/*') ? 'active' : '' }}">
                <a class="nav-link" href="/admin/food-order">
                    <i class="fas fa-bread-slice"></i>
                    <p>Food orders</p>
                </a>
            </li> --}}
            {{-- <li
                class="nav-item {{ request()->is('admin/feedbacks') || request()->is('admin/feedbacks/*') ? 'active' : '' }}">
                <a class="nav-link" href="/admin/feedbacks">
                    <i class="fas fa-comment-dots"></i>
                    <p>Feedback</p>
                </a>
            </li> --}}
        </ul>
    </div>
</div>
