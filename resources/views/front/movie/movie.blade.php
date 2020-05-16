@extends('layouts.app')

@section('title')
    {{ $movie->title }}
@endsection

{{-- @section('header') --}}

@section('content')
    <div class="row mt-4">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">{{ $movie->title }}</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-3">
            @if (Storage::disk('local')->has('poster/' . $movie->poster))
                <img class="img-fluid img-thumbnail rounded" src="{{ route('movie.poster', ['filename' => $movie->poster]) }}" alt="{{ $movie->title }}">
            @endif
        </div>
        <div class="col-lg-9">
            <h1 class="pb-3">{{ $movie->title }}</h1>
            <h4 class="">{{ DateTime::createFromFormat("Y-m-d", $movie->released)->format("Y") }}</h4>
            <h4 class="pb-5">Genres</h4>

            <h5 class="">
                Showtimes
            </h5>
            @if (!empty($shows))
                @foreach ($shows->unique('time') as $data)
                    <a class="btn btn-outline-dark" href="{{ route('movie.seat', ['id' => $movie->id, 'time' => $data->time]) }}">
                        {{ date('G.i', strtotime($data->time)) }}
                    </a>
                @endforeach
            @endif
        </div>
    </div>
@endsection

{{-- @section('footer') --}}