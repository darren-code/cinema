@extends('admin.layouts.master')

@section('page')
    Order Details
@endsection

@section('content')
<a href="{{url('/admin/order')}}" class="btn btn-success">Back to Orders</a>
<br><br>
<div class="row">
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
@endsection