@extends('layouts.app')

@section('title')
    Hi! {{ Auth::user()->username }}
@endsection

@section('content')
    <h3 class="mt-3 text-center">Now Showing</h3>
    <div class="row justify-content-center">
        @foreach ($nowready as $row)
            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                <a href="{{ route('movie.details', ['id' => $row->id]) }}">
                @if (Storage::disk('local')->has('poster/' . $row->poster))
                    <img class="img-fluid img-thumbnail rounded" src="{{ route('movie.poster', ['filename' => $row->poster]) }}" alt="{{ $row->title }}">
                @endif
                </a>
                <a class="showcase-title">{{ $row->title }}</a>
                <p>{{ DateTime::createFromFormat("Y-m-d", $row->released)->format("Y") }}</p>
            </div>
        @endforeach
    </div>
    <div class="dropdown-divider"></div>
    <h3 class="mt-3">Coming Soon</h3>
    <div class="dropdown-divider"></div>
    <div class="row justify-content-center">
        @foreach ($upcoming as $row)
        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
            @if (Storage::disk('local')->has('poster/' . $row->poster))
                <img class="img-fluid img-thumbnail rounded" src="{{ route('movie.poster', ['filename' => $row->poster]) }}" alt="{{ $row->title }}">
            @endif
            <a class="showcase-title">{{ $row->title }}</a>
            <p>{{ DateTime::createFromFormat("Y-m-d", $row->released)->format("Y") }}</p>
        </div>
        @endforeach
    </div>
    <div class="dropdown-divider"></div>
    <h3 class="mt-3">Looking for past movies to review?</h3>
    <div class="dropdown-divider"></div>
    <div class="row justify-content-center">
    @foreach ($morefilm as $row)
    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
        @if (Storage::disk('local')->has('poster/' . $row->poster))
            <img class="img-fluid img-thumbnail rounded" src="{{ route('movie.poster', ['filename' => $row->poster]) }}" alt="{{ $row->title }}">
        @endif
        <a class="showcase-title">{{ $row->title }}</a>
        <p>{{ DateTime::createFromFormat("Y-m-d", $row->released)->format("Y") }}</p>
    </div>
    @endforeach
    </div>
@endsection

