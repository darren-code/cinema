@extends('layouts.app')

@section('title')
    {{ $movie->title }}
@endsection

{{-- @section('header') --}}

@section('content')
    <div class="card col-12">
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

            <div class="card col-8">
                <div class=card>
                    <div class="col-lg-9">
                        <h1 class="pb-3">{{ $movie->title }}</h1>
                        <div class="col-md-3 ">
                            <iframe width="500" height="400" 
                                src="{{ $movie->trailer }}">
                            </iframe>
                        </div>
                        <h4>Year:</h4>
                        <h4 class="">{{ DateTime::createFromFormat("Y-m-d", $movie->released)->format("Y") }}</h4>
                        </br>
                        <h4>Genre:</h4>
                        @if (isset($genres))
                            <h4 class="pb-3">
                                @foreach ($genres as $genre)
                                    {{ $genre->genre }}
                                @endforeach
                            </h4>
                        @endif

                        <h4>Parental Advisory:</h4>
                        <h4 class="pb-3">

                            {{ $movie->parental }}
                        </h4>    
                        
                        <h4>Director:</h4>
                        <h4 class="pb-3">
                            {{ $movie->director }}
                        </h4>    

                        @if ($movie->avail == 1)
                            <h5 class="">
                                Showtimes
                            </h5>
                            @if (!empty($shows))
                                @foreach ($shows->unique('time') as $data)
                                    <a class="btn btn-outline-dark" href="{{ route('movie.seat', ['branch' => Session::get('location'), 'id' => $movie->id, 'time' => $data->time]) }}">
                                        {{ date('G.i', strtotime($data->time)) }}
                                    </a>
                                @endforeach
                            @endif
                        @endif
                    </div>
                </br>
                </div>
                </br>
                <div class="card row-9">
                    <h5 class="pt-3">Synopsis</h5>
                    <p>
                        {{ $movie->synopsis }}
                    </p>
                </div>
            </div>
    </div>
    
@endsection

{{-- @section('footer') --}}