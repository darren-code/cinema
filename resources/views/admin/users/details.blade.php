@extends('admin.layouts.master')

@section('page')
    User Detail
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">{{$orders[0]->user->name}}'s Orders Details</h4>
                <p class="category">List of {{$orders[0]->user->name}}'s Orders Details</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Product Name</th>
                            <th>Address</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Order Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $o)
                        <tr>
                            <td>{{$o->id}}</td>
                            <td>{{$o->products[0]->name}}</td>
                            <td>{{$o->address}}</td>
                            <td>{{$o->orderItems[0]->quantity}}</td>
                            <td>{{$o->orderItems[0]->price}}</td>
                            <td>{{$o->created_at }}</td>
                            <td>
                                
                                @if($o->status)
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