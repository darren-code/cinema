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
            <img class="mb-4" src="{{ URL::to('assets/img/logo.jpg') }}" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Sign Up</h1>
            <label for="firstname" class="sr-only">First Name</label>
            <input type="text" id="firstname" class="form-control mb-3 {{ $errors->has('firstname') ? 'is-invalid' : '' }}"
                placeholder="John" name="firstname" required autofocus value="{{ Request::old('firstname') }}">
            <label for="lastname" class="sr-only">Last Name</label>
            <input type="text" id="lastname" class="form-control  mb-3 {{ $errors->has('lastname') ? 'is-invalid' : '' }}"
                placeholder="Doe" name="lastname" required value="{{ Request::old('lastname') }}">
            <label for="phone" class="sr-only">Phone Number</label>
            <input type="text" id="phone" class="form-control  mb-3 {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                placeholder="08123456789" name="phone" required value="{{ Request::old('phone') }}">
            <label for="gender" class="sr-only">Gender</label>
            <select class="form-control  mb-3" name="gender" id="gender">
                <option value="Male" selected>Male</option>
                <option value="Female">Female</option>
            </select>
            <label for="email" class="sr-only">Email</label>
            <input type="email" id="email" class="form-control mb-3 {{ $errors->has('email') ? 'is-invalid' : '' }}"
                placeholder="john.doe@email.com" name="email" required value="{{ Request::old('email') }}">
            <label for="birthdate" class="sr-only">Birth Date</label>
            <input type="date" id="birthdate" class="form-control mb-3 {{ $errors->has('birthdate') ? 'is-invalid' : '' }}"
                placeholder="31/12/1990" name="birthdate" required value="{{ Request::old('birthdate') }}">
            <label for="username" class="sr-only">User Name</label>
            <input type="text" id="username" class="form-control mb-3 {{ $errors->has('username') ? 'is-invalid' : '' }}"
                placeholder="Username" name="username" required value="{{ Request::old('username') }}">
            <label for="password" class="sr-only">Password</label>
            <input type="password" id="password" class="form-control mb-3 {{ $errors->has('password') ? 'is-invalid' : '' }}"
                placeholder="Password" name="password" required value="{{ Request::old('password') }}">
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

@section('location-selector')
    {{-- Exclude --}}
@stop

@section('header-script')
    {{-- Exclude --}}
@stop