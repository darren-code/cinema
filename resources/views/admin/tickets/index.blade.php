@extends('admin.layouts.master')


@section('page')
    Tickets
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('admin.layouts.message')
        <div class="row">
            <div class="col mb-3">
                {{ link_to_route('ticket.create', "Add Ticket", '', ['class' => 'btn btn-info float-right ']) }}
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h4 class="title">Tickets</h4>
                <p class="category">List of all tickets</p>
            </div>
            <div class="content table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Row Seat</th>
                            <th>Cost</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $t)
                        <tr>
                            <td>{{$t->id}}</td>
                            <td>{{$t->seat}}</td>
                            <td>{{$t->cost}}</td>
                            <td>
                                {{Form::open(['route'=>['ticket.destroy',$t->id],'method'=>'DELETE'])}}
                                    {{link_to_route('ticket.show','',$t->id,['class'=>'btn btn-sm btn-primary fad fa-info-square'])}}                            
                                    {{link_to_route('ticket.edit','',$t->id,['class'=>'btn btn-info btn-sm fad fa-edit']) }}
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
