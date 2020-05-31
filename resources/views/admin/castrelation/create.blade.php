@extends('admin.layouts.master')

@section('page')
    Add Cast Relation
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        @include('admin.layouts.message')
        <div class="row">
            <div class="col mb-3">
                <a href="{{ url('admin/castrelation') }}" class="btn btn-primary float-left">Back to Allocation</a>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h4 class="title">Add Cast Relation</h4>
            </div>
            <div class="content">
                {!!Form::open(['url'=>'/admin/castrelation'])!!} 
                    <div class="row">
                        <div class="col-md-12">
                            @include('admin.castrelation.field')
                            <div class="form-group">
                                {{ Form::submit('Add Cast Relation',['class'=>'btn btn-info btn-fill btn-wd'])}}
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