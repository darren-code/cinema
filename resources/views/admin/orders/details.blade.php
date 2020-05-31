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
                <h4 class="title">Orders Details</h4>
            </div>
            <div class="content table-responsive">
                <table class="table table-striped">
                    <tbody>
                        @foreach($order as $order => $value)
                        <tr>
                            <th>Order ID</th>
                            <td>{{$value->id}}</td>
                        </tr>
                        <tr>
                            <th>Total Price</th>
                            <td>{{$value->total}}</td>
                        </tr>
                        <tr>
                            <th>Payment Method</th>
                            <td>{{$value->method}}</td>
                        </tr>
                        <tr>
                            <th>Order Time</th>
                            <td>{{$value->time}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($value->isPaid == 1)
                                    <span for="" class="label label-success">Paid Already</span>
                                    {{link_to_route('order.pending','Pending This Transaction',$value->id,['class'=>'btn btn-warning btn-sm float-right'])}}
                                @else
                                    <span for="" class="label label-warning">Not Paid Yet</span>
                                    {{link_to_route('order.confirm','Confirm This Transaction',$value->id,['class'=>'btn btn-success btn-sm float-right'])}}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Tickets in this Order</h4>
            </div>
            <div class="content table-responsive">
            @if(isset($tickets[0]))
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Ticket ID</th>
                            <th>Seat</th>
                            <th>Cost</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket => $t)
                            <tr>
                                <td>{{$t->id}}</td>
                                <td>{{$t->seat}}</td>
                                <td>{{$t->cost}}</td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                @else
                    <p class="text-center">
                        No Ticket booked yet
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection