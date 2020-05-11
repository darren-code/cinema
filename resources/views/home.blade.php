@extends('layouts.app')

@section('title')
    Welcome!
@endsection

@section('content')
    <h3>Now Showing</h3>
    <div class="row">
        {{-- @foreach ($movies as $now_showing) --}}
            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                <img class="img-fluid img-thumbnail rounded" src="" alt="" height="400">
            </div>
        {{-- @endforeach --}}
    </div>
    <h3>Coming Soon</h3>
    <div class="row">
        {{-- @foreach ($movies as $now_showing) --}}
            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                <img class="img-fluid img-thumbnail rounded" src="" alt="" height="400">
            </div>
        {{-- @endforeach --}}
    </div>
@endsection