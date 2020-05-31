@extends('admin.layouts.master')

@section('page')
    Cast     
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('admin.layouts.message')
        <div class="row">
            <div class="col mb-3">
                {{ link_to_route('cast.create', "Add Cast", '', ['class' => 'btn btn-info float-right']) }}
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h4 class="title">Cast</h4>
                <p class="category">List of all Cast</p>
            </div>
            <div class="content table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Birthplace</th>
                            <th>Birthdate</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $data => $p)
                            <tr>
                                <td>{{$p->id}}</td>
                                <td>{{$p->name}}</td>
                                <td>{{$p->birthplace}}</td>
                                <td>{{$p->birthdate}}</td>
                                <td>
                                    {{Form::open(['route'=>['cast.destroy',$p->id],'method'=>'DELETE'])}}
                                        {{link_to_route('cast.show','',$p->id,['class'=>'btn btn-info btn-sm fad fa-info-square']) }}
                                        {{link_to_route('cast.edit','',$p->id,['class'=>'btn btn-warning btn-sm fad fa-edit']) }}
                                        {{Form::button('',['class'=>'btn btn-danger btn-sm fad fa-trash-alt','type'=>'submit','onclick'=>'return confirm("Are you sure you want to delete this cast?")'])}}
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