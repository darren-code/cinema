@extends('admin.layouts.master')

@section('page')
    Tickets Details
@endsection

@section('content')
<a href="{{url('/admin/ticket')}}" class="btn btn-success">Back to Tickets</a>
<br><br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Tickets Details</h4>
            </div>
            <div class="content table-responsive">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th style="padding-left: 5em">ID</th>
                            <td align="right">{{$tickets[0]->id}}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 5em">Seat</th>
                            <td align="right">{{$tickets[0]->seat}}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 5em">Transaction ID</th>
                            <td align="right">{{$tickets[0]->transaction}}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 5em">User</th>
                            <td align="right">
                                {{link_to_route('users.index',$tickets[0]->username,$tickets[0]->user_id,[])}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection