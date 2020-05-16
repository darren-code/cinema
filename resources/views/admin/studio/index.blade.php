@extends('admin.layouts.master')

@section('page')
    Studios   
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('admin.layouts.message')
        <div class="row">
            <div class="col mb-3">
                {{ link_to_route('studio.create', "Add Studio", '', ['class' => 'btn btn-info float-right']) }}
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h4 class="title">Studios</h4>
                <p class="category">List of all studios</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($studio as $s)
                        <tr>
                            <td>{{$s->id}}</td>
                            <td>{{$s->name}}</td>
                            <td>
                            @if($s->class==1)
                                Premiere
                            @elseif($s->class==2)
                                Classic
                            @endif
                            </td>
                            <td>
                                {{Form::open(['route'=>['studio.destroy',$s->id],'method'=>'DELETE'])}}
                                    {{link_to_route('studio.details','',$s->id,['class'=>'btn btn-info btn-sm fad fa-info-square'])}}
                                    {{link_to_route('studio.edit','',$s->id,['class'=>'btn btn-warning btn-sm fad fa-edit']) }}
                                    {{Form::button('',['class'=>'btn btn-danger btn-sm fad fa-trash-alt','type'=>'submit','onclick'=>'return confirm("Are you sure you want to delete this studio?")'])}}
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