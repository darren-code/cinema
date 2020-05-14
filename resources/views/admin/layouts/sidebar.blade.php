<div class="sidebar" data-background-color="white" data-active-color="danger">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="" class="simple-text">
                Laramax Admin
            </a>
        </div>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/admin/')}}">
                    <i class="fad fa-tachometer-alt-slow"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/admin/studio/')}}">
                    <i class="fad fa-popcorn"></i>
                    <p>Studio</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/admin/movies/')}}">
                    <i class="fad fa-film"></i>
                    <p>Movies</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/admin/order')}}">
                    <i class="fad fa-calendar"></i>
                    <p>Orders</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/admin/users')}}">
                    <i class="fad fa-users"></i>
                    <p>Users</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/logout') }}">
                    <i class="fad fa-sign-out-alt"></i>
                    <p>Sign Out</p>
                </a>
            </li>
        </ul>
    </div>
</div>