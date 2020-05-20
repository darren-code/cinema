@extends('layouts.app')

@section('title')
{{ $user->username }}'s Profile
@endsection

@section('header')
@section('content')
<div class="emp-profile">
        <div class="card" style="box-shadow:0 4px 5px 0 rgba(0,0,0,0.14), 0 1px 10px 0 rgba(0,0,0,0.12), 0 2px 4px -1px rgba(0,0,0,0.3);background-color: rgba(216, 227, 245, 0.555);">
            <div class="row pt-5">
                <div class="col-md-4 text-center">
                    <div class="panel" style="padding: 15px 25px 25px;">
                        <img class="img-fluid img-thumbnail img-circle img-thumbnail" src="{{ route('user.profile', ['filename' => $user->photo ]) }}"
                            alt="" />
                            <h2>{{$user->firstname." ".$user->lastname}}</h2>
                        <br><br>
                        <p>
                            @if (Session::has('age'))
                                {{ Session::get('age') }} {{-- Ini untuk cek umur nya --}} {{-- User Controller Login Function --}}
                            @endif
                            @if(isset($user->bio))
                                {{$user->bio}}
                            @else
                                No bio yet.
                            @endif
                        </p>
                        <div class="pt-3">
                            <table class="table table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <td>
                                            Rating
                                        </td>
                                        <td>
                                            @if(isset($rating[0]))
                                                {{$rating}}      
                                            @else 
                                                0.0                                          
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Member since
                                        </td>
                                        <td>
                                            {{substr($user->created, 0, 11)}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            {{$user->username}}
                        </h5>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#profile" style="background-color:inherit" role="tab"
                                    aria-controls="home" aria-selected="true">Profile</a> {{-- About --}}
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#history" style="background-color:inherit" role="tab"
                                    aria-controls="profile" aria-selected="false">History</a> {{-- Timeline --}}
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->id }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Username</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->username }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Birth Date</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->birthdate }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Gender</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->gender }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->phone }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="content table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Total Price</th>
                                            <th>Payment Method</th>
                                            <th>Order Time</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 0;
                                        @endphp
                                        @foreach($history as $history => $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->total}}</td>
                                            <td>{{$value->method}}</td>
                                            <td>{{$value->time}}</td>
                                            <td>
                                                @if(isset($status[0]))
                                                    <span for="" class="label label-success">Confirmed</span>
                                                @else
                                                    <span for="" class="label label-warning">Pending</span>
                                                @endif
                                            </td>
                                            @php
                                                $counter++;
                                            @endphp
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <a href="{{url('profile/edit',['id'=>$user->id])}}" class="btn btn-info btn-sm fad fa-edit">
                    </a>
                    <!-- <input type="submit" class="profile-edit-btn float-right" value="Edit Profile" /> -->
                </div>
            </div>
        </div>
</div>
@endsection

@section('footer')

@section('script')
    {{-- Script untuk toggle Edit --}}
    {{-- click -> munculkan/hilangkan input text ganti jadi text biasa  --}}
@endsection