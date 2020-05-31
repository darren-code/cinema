@extends('admin.layouts.master')


@section('page')
    Orders
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('admin.layouts.message')
        <div class="row">
            <div class="col mb-3">
                {{ link_to_route('order.create', "Add Order", '', ['class' => 'btn btn-info float-right']) }}
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h4 class="title">Orders</h4>
                <p class="category">List of all orders</p>
            </div>
            <div class="content table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Total</th>
                            <th>Method</th>
                            <th>Order Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $o)
                        <tr>
                            <td>{{$o->id}}</td>
                            <td>{{$o->username}}</td>
                            <td>{{$o->total}} </td>
                            <td>{{$o->method}} </td>
                            <td>{{$o->time}} </td>
                            <td>
                                {{Form::open(['route'=>['order.destroy',$o->id],'method'=>'DELETE'])}}
                                    {{link_to_route('order.show','',$o->id,['class'=>'btn btn-info btn-sm fad fa-info-square'])}}
                                    {{link_to_route('order.edit','',$o->id,['class'=>'btn btn-warning btn-sm fad fa-edit']) }}
                                    {{Form::button('',['class'=>'btn btn-danger btn-sm fad fa-trash-alt','type'=>'submit','onclick'=>'return confirm("Are you sure you want to delete this?")'])}}
                                {{Form::close()}}
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
