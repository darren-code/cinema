@extends('layouts.app')

@section('title')
    Welcome to The Cinema
@endsection

@section('header')
    {{-- Hide --}}
@stop
@section('content')
<div class = "text-center">
    <img class="mb-4" src="{{ URL::to('assets/img/logo.png') }}" alt="" width="72" height="72">
    <p>Createrd by:</p>
    <p>Darren</p>
    <p>Jonathan</p>
    <p>Royson</p>
    <p>Chendra</p>
    <button class="btn btn-lg btn-primary btn-block">Return</button>
    <p class = "mt-3 mb-3 text-muted">&copy; Flestnia 2020</p>
</div>

@section('footer')
    {{-- Hide --}}
@stop