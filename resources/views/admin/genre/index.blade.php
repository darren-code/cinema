@extends('admin.layouts.master')

@section('page')
    Genre     
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('admin.layouts.message')
        <div class="row">
            <div class="col mb-3">
                {{ link_to_route('genre.create', "Add Genre", '', ['class' => 'btn btn-info float-right']) }}
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h4 class="title">Genre</h4>
                <p class="category">List of all Genre</p>
            </div>
            <div class="content table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Genre</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $data => $p)
                            <tr>
                                <td>{{$p->id}}</td>
                                <td>{{$p->genre}}</td>
                                <td>
                                    {{Form::open(['route'=>['genre.destroy',$p->id],'method'=>'DELETE'])}}
                                        {{link_to_route('genre.edit','',$p->id,['class'=>'btn btn-warning btn-sm fad fa-edit']) }}
                                        {{Form::button('',['class'=>'btn btn-danger btn-sm fad fa-trash-alt','type'=>'submit','onclick'=>'return confirm("Are you sure you want to delete this genre?")'])}}
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