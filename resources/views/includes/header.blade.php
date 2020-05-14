<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{url('home')}}">Laramax</a>
            </div>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#burger-content" aria-controls="burger-content" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="burger-content">
                <form class="form-inline my-2 my-lg-0">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="I'm Looking for ..." aria-label="Recipient's username" aria-describedby="search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="search"><i class="fad fa-search"></i></button>
                        </div>
                    </div>
                </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('movies')}}" id="" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fad fa-clipboard-user"></i> Movies
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('booking')}}" id="" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fad fa-graduation-cap"></i> My Bookings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('favourite')}}" id="" role="button" {{-- data-toggle="" --}} aria-haspopup="true" aria-expanded="false">
                            <i class="fad fa-brain"></i> Favourite
                        </a>
                    </li>
                    @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a href='#' class='nav-link dropdown-toggle' id='more' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            Hello, {{ Auth::user()->username }}
                        </a>
                        <div class='dropdown-menu' aria-labelledby='more'>
                            <a href='{{ route('profile') }}' class='dropdown-item'>Profile</a>
                            <a href='{{ route('signout') }}' class='dropdown-item'>Sign Out</a>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>