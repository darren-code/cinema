@extends('admin.layouts.master')

@section('page')
    Airtime
@endsection

@section ('content')
<div class="row">
    <div class="col-md-12">
        @include('admin.layouts.message')
        <div class="row">
            <div class="col mb-3">
                {{ link_to_route('showtime.create', "Add Airtime", '', ['class' => 'btn btn-info float-right']) }}
            </div>
        </div>
        <div class="card"> 
            <div class="header">
                <h4 class="title">All Airtime</h4>
                <p class="category">List of all Airtime</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Airtime</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($showtime as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->time }}</td>
                                <td>
                                    {{Form::open(['route'=>['showtime.destroy',$p->id],'method'=>'DELETE'])}}
                                        {{link_to_route('showtime.show','',$p->id,['class'=>'btn btn-info btn-sm fad fa-info-square'])}}
                                        {{link_to_route('showtime.edit','',$p->id,['class'=>'btn btn-info btn-sm fad fa-edit']) }}
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
