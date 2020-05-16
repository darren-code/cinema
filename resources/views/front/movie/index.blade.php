@extends('layouts.app')

@section('title')
    Hi! {{ Auth::user()->username }}
@endsection

@section('content')
    <div class="row pt-3">
        <div class="col">
            <p>Search Movie Here...</p>
            <form class="form-inline my-2 my-lg-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="I'm Looking for ..." aria-label="Recipient's username" aria-describedby="search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="search"><i class="fad fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row pt-3">
        @foreach ($movies as $movie)
            <div class="col-lg-3 col-xl-3 col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('movie.details', ['id' => $movie->id]) }}">
                    @if (Storage::disk('local')->has('poster/' . $movie->poster))
                        <img class="img-fluid img-thumbnail rounded" src="{{ route('movie.poster', ['filename' => $movie->poster]) }}" alt="{{ $movie->title }}">
                    @endif
                </a>
                <a class="showcase-title">{{ $movie->title }}</a>
                <p>{{ DateTime::createFromFormat("Y-m-d", $movie->released)->format("Y") }}</p>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col">
        <nav aria-label="...">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <span class="page-link">
                    2
                    <span class="sr-only">(current)</span>
                    </span>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
        </div>
    </div>
@endsection