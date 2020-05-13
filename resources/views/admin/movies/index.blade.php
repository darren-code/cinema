@extends('admin.layouts.master')

@section('page')
Movies
@endsection

@section ('content')
<div class="row">
    <div class="col-md-12">
        @include('admin.layouts.message')
        <div class="row">
            <div class="col mb-3">
                {{ link_to_route('movies.create', "Add Movie", '', ['class' => 'btn btn-info float-right']) }}
            </div>
        </div>
        <div class="card"> 
            <div class="header">
                <h4 class="title">All Movies</h4>
                <p class="category">List of all movies</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Director</th>
                            <th>Consent</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($movies as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->title }}</td>
                                <td>{{ $p->director }}</td>
                                <td>
                                    @if($p->parental==0)
                                        General
                                    @elseif($p->parental==10)
                                        Parental Guidance
                                    @elseif($p->parental==13)
                                        Parental Guidance Above 13
                                    @elseif($p->parental==16)
                                        Restricted
                                    @elseif($p->parental==18)
                                        No One Under 17
                                    @endif
                                </td>
                                <td><img src="{{ route('movie.poster', ['filename' => $p->poster]) }}" alt="" class="img-thumbnail" style="width: 50px"></td>
                                <td>
                                    {{Form::open(['route'=>['movies.destroy',$p->id],'method'=>'DELETE'])}}
                                        {{Form::button('',['class'=>'btn btn-danger btn-sm fad fa-trash-alt','type'=>'submit','onclick'=>'return confirm("Are you sure you want to delete this?")'])}}
                                        {{link_to_route('movies.edit','',$p->id,['class'=>'btn btn-info btn-sm fad fa-edit']) }}
                                        {{link_to_route('movies.show','',$p->id,['class'=>'btn btn-info btn-sm fad fa-info-square'])}}
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
