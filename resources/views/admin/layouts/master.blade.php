<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Laramax Admin</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <link rel="stylesheet" href="{{ URL::to('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/main.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    {{-- {{Html::style('assets/css/bootstrap.min.css')}} --}}
    {{Html::style('assets/css/animate.min.css')}}
    {{Html::style('assets/css/paper-dashboard.css')}}
    
    {{-- Alternative Solution (CDN) for Animate CSS --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" integrity="sha384-sUbL2A+2oJ+mNbUpTkeSUcpwQLlpAbSfDFn8BzmnZXML6ZVMioYnq6rV1MaAIHKM" crossorigin="anonymous"> --}}
    
    {{Html::style('assets/css/animate.min.css')}}
    {{-- {{Html::style('http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css')}} --}}
    {{Html::style('https://fonts.googleapis.com/css?family=Muli:400,300')}}
    {{Html::style('assets/css/themify-icons.css')}}
    {{Html::style('assets/css/style.css')}}
</head>

<body>

<div class="wrapper">
    @include('admin.layouts.sidebar')
    <div class="main-panel">
        <nav class="navbar navbar-inverse bg-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">@yield('page')</a>
                </div> {{-- Kok ada <hr> ? --}}
                <button class="navbar-toggler d-md-block d-sm-block d-xs-block d-lg-none d-xl-none align-self-start" type="button" data-toggle="collapse" data-target="#burger-content" aria-controls="burger-content" aria-expanded="false">
                    <span class="navbar-toggler-icon">
                        <i class="btn btn-primary fad fa-cheeseburger"></i>
                    </span>
                </button>

                <div class="collapse navbar-collapse d-lg-none d-xl-none" id="burger-content">
                    <ul class="nav navbar-nav navbar-right">
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
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="drop-down" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fad fa-wrench"></i>
                                <p>{{auth()->guard('admin')->check() ? auth()->guard()->user()->name : 'Account'}}</p>
                                {{-- <p>Account</p> --}}
                                {{-- <b class="caret"></b> --}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="drop-down">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="{{url('admin/logout')}}">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content" style="padding: 0 15px">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="copyright pull-right">
                    &copy;
                    <script>document.write(new Date().getFullYear())</script>
                    <i class="fa fa-heart heart"></i> by <a href="{{url('/')}} ">Laramax</a>
                </div>
            </div>
        </footer>

    </div>
</div>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-ZvpUoO/+PpLXR1lu4jmpXWu80pZlYUAfxl5NsBMWOEPSjUn/6Z/hRTt8+pR6L4N2" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>

<script>
    $(document).ready(function(){
        $("input.timepicker").timepicker({
            showMeridian:  false,
            defaultTime: '02:45 PM'
        })
    })
</script>

{{-- {{Html::script('assets/js/jquery-1.10.2.js')}}
{{Html::script('assets/js/script.js')}}
{{Html::script('https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js')}} --}}
</html>
