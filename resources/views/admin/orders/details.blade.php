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
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Total Price</th>
                            <th>Payment Method </th>
                            <th>Order Time</th>
                            <th>Status</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $order => $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{$value->total}}</td>
                            <td>{{$value->method}}</td>
                            <td>{{$value->time}}</td>
                            <td>
                                @if(isset($orders[0]->payment))
                                    <span for="" class="label label-success">Confirmed</span>
                                @else
                                    <span for="" class="label label-warning">Pending</span>
                                @endif
                            </td>
                            <!-- <td>
                                {{link_to_route('order.approve','Approve',$value->id,['class'=>'btn btn-info btn-sm '])}}
                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection