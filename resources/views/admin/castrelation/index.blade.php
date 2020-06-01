@extends('admin.layouts.master')

@section('page')
    Cast Relation    
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('admin.layouts.message')
        <div class="row">
            <div class="col mb-3">
                {{ link_to_route('castrelation.create', "Add Cast Relation", '', ['class' => 'btn btn-info float-right']) }}
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h4 class="title">Cast Relation</h4>
                <p class="category">List of all Cast Relation</p>
            </div>
            <div class="content table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cast</th>
                            <th>Movie</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $data => $p)
                            <tr>
                                <td>
                                    {{$p->id}}
                                </td>
                                <td>
                                    {{link_to_route('cast.show',$p->name,$p->cast_id,[])}}
                                </td>
                                <td>
                                    {{link_to_route('movies.show',$p->title,$p->movie_id,[])}}
                                </td>
                                <td>
                                    {{Form::open(['route'=>['castrelation.destroy', $p->id],'method' => 'DELETE'])}}
                                        {{link_to_route('castrelation.edit', '', $p->id, ['class' => 'btn btn-warning btn-sm fad fa-edit']) }}
                                        {{Form::button('', ['class'=>'btn btn-danger btn-sm fad fa-trash-alt', 'type' => 'submit', 'onclick' => 'return confirm("Are you sure you want to delete this allocation?")'])}}
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