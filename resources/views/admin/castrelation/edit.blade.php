@extends('admin.layouts.master')

@section('page')
Edit Genre Relation
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        @include('admin.layouts.message')
        <div class="row">
            <div class="col mb-3">
                <a href="{{ url('admin/castrelation') }}" class="btn btn-primary float-left">Back to Genre Relation</a>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h4 class="title">Edit Cast Relation</h4>
            </div>
            <div class="content">
                {{ Form::open(['url'=>[ 'admin/castrelation',$data->id], 'method' => 'put']) }} 
                    <div class="row">
                        <div class="col-md-12">
                            @include('admin.castrelation.field')
                        </div>
                        <div class="form-group">
                            {{ Form::submit('Update Cast Relation',['class'=>'ml-3 btn btn-info btn-fill btn-wd'])}}
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