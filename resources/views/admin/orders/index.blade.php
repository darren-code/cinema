@extends('admin.layouts.master')


@section('page')
    Orders
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('admin.layouts.message')
        <div class="card">
            <div class="header">
                <h4 class="title">Orders</h4>
                <p class="category">List of all orders</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $o)
                        <tr>
                            <td>{{$o->id}}</td>
                            <td>{{$o->user->name}}</td>
                            @foreach($o->products as $i)
                                <td>{{$i->name}}</td>
                            @endforeach
                            @foreach($o->orderItems as $i)
                                <td>{{$i->quantity}}</td>
                            @endforeach

                            @if($o->status)
                                <td><span class="label label-success">Confirmed</span></td>
                            @else
                                <td><span class="label label-warning">Pending</span></td>
                            @endif
                            <td>
                            @if($o->status)
                                {{link_to_route('order.pending','Pending',$o->id,['class'=>'btn btn-warning btn-sm'])}}
                            @else
                                {{link_to_route('order.confirm','Confirm',$o->id,['class'=>'btn btn-success btn-sm'])}}
                            @endif
                            {{link_to_route('order.show','',$o->id,['class'=>'btn btn-sm btn-primary ti-view-list-alt','title'=>'Details'])}}                            
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
