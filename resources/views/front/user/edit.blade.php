@extends('layouts.app')

@section('title')
{{ $user->username }}'s Profile
@endsection

@section('header')
@section('content')
<div class="emp-profile">
<div class="card">
    <div class="header">
        <h4 class="title">Edit Profile</h4>
    </div>
    <div class="content">
        <!-- {{ Form::open(['url'=>[ 'profile/update',$user->id], 'method' => 'put']) }}  -->
        <form action="{{ url('profile/update') }}" method="PUT">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    @include('front.user._field')
                    <div class="form-group">
                        {{ Form::submit('Update Profile', ['class'=>'btn btn-info btn-fill btn-wd']) }}
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

@endsection
@endsection