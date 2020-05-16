@extends('admin.layouts.master')

@section('page')
    Dashboard 
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col">
                            <div class="icon-big icon-warning text-center float-left">
                                <i class="fad fa-camera-movie"></i>
                            </div>
                        </div>
                        <div class="col">
                            <div class="numbers">
                                <p>Studio</p>
                                {{$studio->count()}}
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr/>
                        <div class="stats">
                            <a href="{{url('/admin/studio')}}">
                                <i class="fad fa-info-square"></i> Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col">
                            <div class="icon-big icon-success text-center float-left">
                                <i class="fad fa-film-alt"></i>
                            </div>
                        </div>
                        <div class="col">
                            <div class="numbers">
                                <p>Movies</p>
                                {{$movies->count()}}
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr/>
                        <div class="stats">
                            <a href="{{url('/admin/movies')}}">
                                <i class="fad fa-info-square"></i> Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col">
                            <div class="icon-big icon-danger text-center float-left">
                                <i class="fad fa-ticket"></i>
                            </div>
                        </div>
                        <div class="col">
                            <div class="numbers">
                                <p>Ticket</p>
                                {{$orders->count()}}
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr/>
                        <div class="stats">
                            <a href="{{url('/admin/order')}}">
                                <i class="fad fa-info-square"></i> Details
                            </a>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col">
                            <div class="icon-big icon-info text-center float-left">
                                <i class="fad fa-users"></i>
                            </div>
                        </div>
                        <div class="col">
                            <div class="numbers">
                                <p>Users</p>
                                {{$user->count()}}
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr/>
                        <div class="stats">
                            <a href="{{url('/admin/users')}}">
                                <i class="fad fa-info-square"></i> Details
                            </a>                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
