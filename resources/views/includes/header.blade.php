<header style="font-family: Montserrat">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="box-shadow:0 4px 5px 0 rgba(0,0,0,0.14), 0 1px 10px 0 rgba(0,0,0,0.12), 0 2px 4px -1px rgba(0,0,0,0.3)">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{url('/movie/'. Session::get('location'))}}">Laramax</a>
            </div>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#burger-content" aria-controls="burger-content" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="burger-content">
                
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('browse') }}" id="" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fad fa-file-search"></i> Browse Movies
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('favourite') }}" id="branch-selector" role="button" data-toggle="modal" data-target="#location-selector" aria-haspopup="true" aria-expanded="false">
                            <i class="fad fa-map-marked-alt"></i> Change Location
                        </a>
                    </li>
                    @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a href='#' class='nav-link dropdown-toggle' id='more' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            Hello, {{ Auth::user()->username }}
                        </a>
                        <div class='dropdown-menu' aria-labelledby='more'>
                            <a href="{{ url('profile', Auth::user()->id) }}" class="dropdown-item">Profile</a>
                            <a href="{{ route('signout') }}" class="dropdown-item">Sign Out</a>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>