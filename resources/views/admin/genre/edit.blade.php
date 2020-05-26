@extends('admin.layouts.master')

@section('page')
    Edit Genre
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        @include('admin.layouts.message')
        <div class="row">
            <div class="col mb-3">
                <a href="{{ url('admin/genre') }}" class="btn btn-primary float-left">Back to Genre</a>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h4 class="title">Edit Genre</h4>
            </div>
            <div class="content">
                {{ Form::open(['url'=>[ 'admin/genre',$data->id], 'method' => 'put']) }} 
                    <div class="row">
                        <div class="col-md-12">
                            @include('admin.genre.field')
                            <div class="form-group">
                                {{ Form::submit('Update Genre',['class'=>'btn btn-info btn-fill btn-wd'])}}
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                    </div> 
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection