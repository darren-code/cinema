@extends('admin.layouts.master')

@section('page')
    Studio Allocation    
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('admin.layouts.message')
        <div class="row">
            <div class="col mb-3">
                {{ link_to_route('playing.create', "Add Allocation", '', ['class' => 'btn btn-info float-right']) }}
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h4 class="title">Studio Allocation</h4>
                <p class="category">List of all Studio Allocation</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Studio</th>
                            <th>Movie</th>
                            <th>Airtime</th>
                            <th>Branch</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($playing as $playing => $p)
                            <tr>
                                <td>{{$p->id}}</td>
                                <td>{{$p->name}}</td>
                                <td>{{$p->title}}</td>
                                <td>{{substr($p->time,0,5) }}</td>
                                <td>{{$p->location}}</td>
                                <td>
                                    {{Form::open(['route'=>['playing.destroy',$p->id],'method'=>'DELETE'])}}
                                        {{link_to_route('playing.show','',$p->id,['class'=>'btn btn-info btn-sm fad fa-info-square'])}}
                                        {{link_to_route('playing.edit','',$p->id,['class'=>'btn btn-warning btn-sm fad fa-edit']) }}
                                        {{Form::button('',['class'=>'btn btn-danger btn-sm fad fa-trash-alt','type'=>'submit','onclick'=>'return confirm("Are you sure you want to delete this allocation?")'])}}
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