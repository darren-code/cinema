@extends('admin.layouts.master')

@section('page')
    Add Movie
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        @include('admin.layouts.message')
        <div class="card">
            <div class="header">
                <h4 class="title">Add Movie</h4>
            </div>
            <div class="content">
                {!!Form::open(['url'=>'/admin/movies','files'=>'true'])!!} 
                    <div class="row">
                        <div class="col-md-12">

                            @include('admin.movies._field')
                            <div class="form-group">
                                {{ Form::submit('Add Movie',['class'=>'btn btn-info btn-fill btn-wd'])}}
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
