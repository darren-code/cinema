@extends('admin.layouts.master')

@section('page')
    User Detail
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">User Details</h4>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{$users[0]->id}}</td>
                        </tr>

                        <tr>
                            <th>Username</th>
                            <td>{{$users[0]->username}}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{$users[0]->email}}</td>
                        </tr>

                        <tr>
                            <th>Birth date</th>
                            <td>{{$users[0]->birthdate}}</td>

                        </tr>

                        <tr>
                            <th>Profile Photo</th>
                            <td>
                                <img src="{{ route('user.profile', ['filename' => $users[0]->photo]) }}" alt="" class="img-thumbnail" style="width: 150px;">
                            </td>
                        </tr>

                        <tr>
                            <th>Created At</th>
                            <td>{{$users[0]->created}}</td>
                        </tr>

                        <tr>
                            <th>Updated At</th>
                            <td>{{$users[0]->updated}}</td>
                        </tr>

                    </tbody>

                </table>

            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">{{$users[0]->username}}'s Orders Details</h4>
                <p class="category">List of {{$users[0]->username}}'s Orders Details</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Total Price</th>
                            <th>Payment Method </th>
                            <th>Order Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $o)
                        <tr>
                            <td>{{$order[0]->id}}</td>
                            <td>{{$order[0]->total}}</td>
                            <td>{{$order[0]->method}}</td>
                            <td>{{$order[0]->time}}</td>
                            <td>
                                @if(isset($orders[0]->payment))
                                    <span for="" class="label label-success">Confirmed</span>
                                @else
                                    <span for="" class="label label-warning">Pending</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<a href="{{url('/admin/users')}}" class="btn btn-success">Back to Users</a>
@endsection