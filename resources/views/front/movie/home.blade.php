@extends('layouts.app')

@section('title')
    Hi! {{ Auth::user()->username }}
@endsection

@section('content')

@include('includes.alert')

    @if (Session::has('location'))
    <h3 class="mt-3 text-center"><a class="text-decoration-none" href="{{ route('now.showing') }}">Now Showing</a></h3>
        <div class="row justify-content-center">
            @if (isset($nowready[0]))
                @foreach ($nowready->unique('title') as $row)
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <a href="{{ route('movie.details', ['branch' => Session::get('location'), 'id' => $row->mid]) }}">
                        @if (Storage::disk('local')->has('poster/' . $row->poster))
                            <img class="img-fluid img-thumbnail rounded" src="{{ route('movie.poster', ['filename' => $row->poster]) }}" alt="{{ $row->title }}">
                        @endif
                        </a>
                        <a class="showcase-title">{{ $row->title }}</a>
                        <p>{{ DateTime::createFromFormat("Y-m-d", $row->released)->format("Y") }}</p>
                    </div>
                @endforeach
            @else
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="text-center">
                        <img src="{{asset('/public/assets/svg/not_found.svg')}}" alt="No Showing Movie" width="50%">
                    </div>
                    <div class="text-center mt-3">
                        <br><br>
                        <h5>No Movie is ready to show. Sorry for the inconvenience.</h5>
                    </div>
                </div>
            @endif
        </div>
        <div class="dropdown-divider"></div>
        <h3 class="mt-3 text-center"><a class="text-decoration-none" href="{{ route('coming.soon') }}">Coming Soon</a></h3>
        <div class="dropdown-divider"></div>
        <div class="row justify-content-center">
            @if(isset($upcoming[0]))
                @foreach ($upcoming->unique('title') as $row)
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <a href="{{ route('movie.details', ['branch' => Session::get('location'), 'id' => $row->mid]) }}">
                    @if (Storage::disk('local')->has('poster/' . $row->poster))
                        <img class="img-fluid img-thumbnail rounded" src="{{ route('movie.poster', ['filename' => $row->poster]) }}" alt="{{ $row->title }}">
                    @endif
                    </a>
                    <a class="showcase-title">{{ $row->title }}</a>
                    <p>{{ DateTime::createFromFormat("Y-m-d", $row->released)->format("Y") }}</p>
                </div>
                @endforeach
            @else
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="text-center">
                        <img src="{{asset('/public/assets/svg/nothing.svg')}}" alt="No Upcoming Movie" width="35%">
                    </div>
                    <div class="text-center mt-3">
                        <br><br>
                        <h5>No Movie is yet to come. Sorry for the inconvenience.</h5>
                    </div>
                </div>
            @endif
        </div>
        <div class="dropdown-divider"></div>
        <h3 class="mt-3"><a href="{{ route('browse') }}" class="text-decoration-none">Looking for past movies to review?</a></h3>
        <div class="dropdown-divider"></div>
        <div class="row justify-content-center">
        @if (isset($morefilm))
        @foreach ($morefilm->unique('title') as $row)
        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
            <a href="{{ route('movie.details', ['branch' => Session::get('location'), 'id' => $row->id]) }}">
            @if (Storage::disk('local')->has('poster/' . $row->poster))
                <img class="img-fluid img-thumbnail rounded" src="{{ route('movie.poster', ['filename' => $row->poster]) }}" alt="{{ $row->title }}">
            @endif
            </a>
            <a class="showcase-title">{{ $row->title }}</a>
            <p>{{ DateTime::createFromFormat("Y-m-d", $row->released)->format("Y") }}</p>
        </div>
        @endforeach
        @endif
        </div>
    @endif
@endsection

