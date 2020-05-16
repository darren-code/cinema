@extends('layouts.app')

@section('title')
    {{ $movie->title }}
@endsection

{{-- @section('header') --}}

@section('content')
<form action="{{-- route('') --}}" accept-charset="utf-8" method="post">
    <div class="row mt-4">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('movie.details', ['id' => $movie->id]) }}">{{ $movie->title }}</a></li>
                    <li class="breadcrumb-item active"><a href="#">{{ date('G.i', strtotime($time)) }}</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-3">
            @if (Storage::disk('local')->has('poster/' . $movie->poster))
                <img class="img-fluid img-thumbnail rounded" src="{{ route('movie.poster', ['filename' => $movie->poster]) }}" alt="{{ $movie->title }}">
            @endif
            <h1 class="text-center">{{ $movie->title }}</h1>
            <h4 class="text-center">{{ DateTime::createFromFormat("Y-m-d", $movie->released)->format("Y") }}</h4>
        </div>
        <div class="col-lg-9">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                @foreach ($shows as $row)
                <li class="nav-item">
                    <a class="nav-link" id="studio-{{ $row->name }}-tab" data-toggle="pill" href="#studio-{{ $row->name }}" role="tab" aria-controls="studio-{{ $row->name }}" aria-selected="true">Studio {{ $row->name }}</a>
                </li>
                @endforeach
                {{-- <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                </li> --}}
            </ul>
            <div class="tab-content" id="pills-tabContent">
                @foreach ($shows as $row)
                    <div class="tab-pane fade" id="studio-{{ $row->name }}" role="tabpanel" aria-labelledby="studio-{{ $row->name }}-tab">
                        
                        {{-- Seat Layout Settings --}}

                        @if ($row->class == 1)
                            @php
                                $side = 8;
                                $center = 24;
                            @endphp
                        @else
                            @php
                                $side = 16;
                                $center = 48;
                            @endphp
                        @endif

                        {{-- Seat Layout Preview --}}
                        
                        <div class="row justify-content-between">
                            <div class="col-lg-3 col-xl-3 col-md-3">
                                <div class="row mr-auto">
                                    @for ($i = 0; $i < $side; $i++)
                                    <div class="col-6 pb-3">
                                        <input type="checkbox" data-on="Booked" data-off="A{{ $i }}" data-onstyle="danger" data-toggle="toggle" data-size="sm">
                                    </div>
                                    @endfor
                                </div>
                            </div>

                            <div class="col-lg-6 col-xl-6 col-md-6">
                                <div class="row mx-auto">
                                    @for ($i = 0; $i < $center; $i++)
                                        <div class="col-2 pb-3">
                                            <input type="checkbox" data-on="Booked" data-off="B{{ $i }}" data-onstyle="success" data-toggle="toggle" data-size="sm"/>
                                        </div>
                                    @endfor
                                </div>
                            </div>

                            <div class="col-lg-3 col-xl-3 col-md-3">
                                <div class="row ml-auto">
                                    @for ($i = 0; $i < $side; $i++)
                                    <div class="col-6 pb-3">
                                        <input type="checkbox" data-on="Booked" data-off="C{{ $i }}" data-onstyle="primary" data-toggle="toggle" data-size="sm">
                                    </div>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <div class="dropdown-divider"></div>

                        <div class="d-flex justify-content-center bg-primary rounded">
                            <h2 class="text-center text-light">
                                Screen
                            </h2>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">A0</div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">A1</div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">A2</div> --}}
            </div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col">
            <a href="{{-- route('') --}}" class="btn btn-danger float-right">Proceed to Payment <i class="fad fa-credit-card"></i></a>
        </div>
    </div>
</form>
@endsection

{{-- @section('footer') --}}