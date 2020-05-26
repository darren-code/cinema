@extends('layouts.app')

@section('title')
    Hi! {{ Auth::user()->username }}
@endsection

@section('content')

@include('includes.alert')

    <div class="row pt-3">
        <div class="col">
            <p>Search Movie Here...</p>
            <form class="form-inline my-2 my-lg-0" action="{{ route('search') }}" accept-charset="utf-8" method="get">
                {{-- @csrf --}} {{-- csrf_field() --}}
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="I'm Looking for ..." aria-describedby="search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="search"><i class="fad fa-search"></i></button>
                    </div>
                </div>
                <label class="pl-3 pr-3" for="orderBy">Sort</label>
                <select name="orderBy" id="orderBy" class="form-control">
                    <option value="default" selected>--</option>
                    <option value="asc">Oldest</option>
                    <option value="desc">Newest</option>
                    <option value="title">Alphabetical</option>
                </select>
                <label class="pl-3 pr-3" for="parental">Rating</label>
                <select name="parental" id="parental" class="form-control">
                    <option value="default" selected>--</option>
                    <option value="G">G</option>
                    <option value="PG">PG</option>
                    <option value="PG-13">PG-13</option>
                    <option value="R">R</option>
                    <option value="NC-17">NC-17</option>
                </select>
                <label class="pl-3 pr-3" for="category">Genre</label>
                <select name="category" id="category" class="form-control">
                    <option value="default" selected>--</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->genre }}">{{ $genre->genre }}</option>
                    @endforeach
                </select>
                <label class="pl-3 pr-3" for="year">Year</label>
                <select name="year" id="year" class="form-control">
                    <option value="default" selected>--</option>
                    @for ($i = 0; $i < 100; $i++)
                        <option value="{{ date('Y') - $i }}">{{ date('Y') - $i }}</option>
                    @endfor
                </select>
            </form>
        </div>
    </div>
    <div class="row pt-3">
        @if (isset($movies))
            @foreach ($movies as $movie)
                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('movie.details', ['branch' => Session::get('location'), 'id' => $movie->id]) }}">
                        @if (Storage::disk('local')->has('poster/' . $movie->poster))
                            <img class="img-fluid img-thumbnail rounded" src="{{ route('movie.poster', ['filename' => $movie->poster]) }}" alt="{{ $movie->title }}">
                        @endif
                    </a>
                    <a class="showcase-title">{{ $movie->title }}</a>
                    <p>{{ DateTime::createFromFormat("Y-m-d", $movie->released)->format("Y") }}</p>
                </div>
            @endforeach
        @else
            <h1 class="text-danger">Nothing Found</h1>
        @endif
    </div>
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-center">
                @if (isset($data))
                    {{ $movies->appends($data)->links() }}
                @else
                    {{ $movies->links() }}
                @endif
            </div>
            {{-- <nav aria-label="...">
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
            </nav> --}}
        </div>
    </div>
@endsection