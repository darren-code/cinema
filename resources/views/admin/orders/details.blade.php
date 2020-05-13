@extends('admin.layouts.master')

@section('page')
    Order Details
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Order Details</h4>
                <p class="category">Order Details</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Quantity</th>
                            <th>Address</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>{{$order->id}}</th>
                            <td>{{$order->date}}</td>
                            <td>{{$order->orderItems[0]->quantity}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->orderItems[0]->price}}</td>

                            @if($order->status)
                                <td><span class="label label-success">Confirmed</span></td>
                            @else
                                <td><span class="label label-warning">Pending</span></td>
                            @endif
                            
                            @if($order->status)
                                <td>{{link_to_route('order.pending','Pending',$order->id,['class'=>'btn btn-warning btn-sm'])}}</td>
                            @else
                            <td>{{link_to_route('order.confirm','Confirm',$order->id,['class'=>'btn btn-success btn-sm'])}}</td>
                            @endif
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="header">
                <h4 class="title">User Details</h4>
                <p class="category">User Details</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{$order->user->id}}</th>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <th>{{$order->user->name}}</th>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <th>{{$order->user->email}}</th>
                        </tr>
                        <tr>
                            <th>Registered At</th>
                            <th>{{$order->user->created_at.", ".$order->user->created_at->diffForHumans()}}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="header">
                <h4 class="title">Product Details</h4>
                <p class="category">Product Details</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{$order->products[0]->id}}</th>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <th>{{$order->products[0]->name}}</th>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <th>{{$order->products[0]->price}}</th>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td>
                                <a href="{{url('uploads').'/'.$order->products[0]->image}}" target="_blank" >
                                    <img src="{{url('uploads').'/'.$order->products[0]->image}}" width="150px">
                                </a>
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div> 
<a href="{{url('/admin/order')}}" class="btn btn-success">Back to Orders</a>
@endsection