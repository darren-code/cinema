@extends('admin.layouts.master')

@section('page')
View Tickets
@endsection

@section ('content')
<div class="row">
    <div class="col-md-12">
        @include('admin.layouts.message')
        <div class="card"> 
            <div class="header">
                <h4 class="title">All Tickets</h4>
                <p class="category">List of all tickets</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Desc</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($ticket as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>${{ $p->price }}</td>
                                <td>{{ $p->description}}</td>
                                <td><img src="../uploads/{{ $p -> image}}" alt="" class="img-thumbnail" style="width: 50px"></td>
                                <td>
                                    {{Form::open(['route'=>['tickets.destroy',$p->id],'method'=>'DELETE'])}}
                                        {{Form::button('',['class'=>'btn btn-danger btn-sm ti-trash','type'=>'submit','onclick'=>'return confirm("Are you sure you want to delete this?")'])}}
                                        {{link_to_route('tickets.edit','',$p->id,['class'=>'btn btn-info btn-sm ti-pencil']) }}
                                        {{link_to_route('tickets.show','',$p->id,['class'=>'btn btn-info btn-sm ti-list'])}}
                                    {{Form::close()}}

                                    <!-- <button class="btn btn-sm btn-info ti-pencil-alt" title="Edit"></button>
                                    <button class="btn btn-sm btn-danger ti-trash" title="Delete"></button>
                                    <button class="btn btn-sm btn-primary ti-view-list-alt" title="Details"></button> -->
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
