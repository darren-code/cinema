@extends('layouts.app')

@section('title')
    Hi! {{ Auth::user()->username }}
@endsection

@section('content')

@include('includes.alert')

    @if (Session::has('location'))
        <h3 class="mt-3">Now Showing</h3>
        <div class="row justify-content-center">
            @if (isset($nowready))
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
            @endif
        </div>
        <div class="dropdown-divider"></div>
        <h3 class="mt-3">Coming Soon</h3>
        <div class="dropdown-divider"></div>
        <div class="row justify-content-center">
            @if (isset($upcoming))
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
            @endif
        </div>
        <div class="dropdown-divider"></div>
        <h3 class="mt-3">Looking for past movies to review?</h3>
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

