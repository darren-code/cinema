@extends('layouts.app')

@section('title')
    Welcome to Laramax
@endsection

@section('header')
    {{-- Hide --}}
@stop

@section('content')
@include('includes.alert')
    <div class="text-center login-area">
        <form action="{{ route('signup') }}" method="post" class="form-signin needs-validation" accept-charset="utf-8" novalidate>
            <img class="mb-4" src="{{ URL::to('assets/img/logo.png') }}" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Laramax</h1>
            <label for="username" class="sr-only">Username</label>
            <input type="text" id="username" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}"
                placeholder="Username" name="username" required autofocus value="{{ Request::old('username') }}">
            <label for="email" class="sr-only">Email</label>
            <input type="email" id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                placeholder="john.doe@email.com" name="email" required value="{{ Request::old('email') }}">
            <label for="birthdate" class="sr-only">Birthdate</label>
            <input type="date" id="birthdate" class="form-control {{ $errors->has('birthdate') ? 'is-invalid' : '' }}"
                placeholder="31/12/1990" name="birthdate" required value="{{ Request::old('birthdate') }}">
            <label for="password" class="sr-only">Password</label>
            <input type="password" id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                placeholder="Password" name="password" required value="{{ Request::old('password') }}">
            <div class="checkbox mb-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember" class="custom-control-input" id="remember-me">
                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                  </div>
            </div>
            <div class="mb-3">
                <a href="{{ route('login') }}">Have an account?</a>
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
            <p class="mt-3 mb-3 text-muted">&copy; Flestnia 2020</p>
        </form>
        
    </div>
@endsection

@section('footer')
    {{-- Hide --}}
@stop