<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('') }}">The Cinema</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <a class="nav-link" href="{{ route('') }}" id="" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
                    <i class="fad fa-clipboard-user"></i> Movies
                </a>
                <a class="nav-link" href="{{ route('') }}" id="" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
                    <i class="fad fa-graduation-cap"></i> My Bookings
                </a>
                <a class="nav-link" href="{{ route('') }}" id="" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
                    <i class="fad fa-brain"></i> Favourite
                </a>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                @if(Auth::check())
                <li class="nav-item dropdown">
                    <a href='#' class='nav-link dropdown-toggle' id='more' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Hello, {{-- Session --}}
                    </a>
                    <div class='dropdown-menu' aria-labelledby='more'>
                        <a href='{{ route('') }}' class='dropdown-item'>Profile</a>
                        <a href='{{ route('') }}' class='dropdown-item'>Sign Out</a>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </nav>
</header>