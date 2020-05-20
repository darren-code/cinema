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
            <div class="content table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Total</th>
                            <th>Method</th>
                            <th>Time</th>
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
                                {{link_to_route('order.show','Details',$o->id,['class'=>'btn btn-sm btn-primary','title'=>'Details'])}}                            
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
