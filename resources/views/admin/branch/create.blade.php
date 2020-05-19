@extends('admin.layouts.master')

@section('page')
    Add Branch
@endsection

@section('content')
<a href="{{url('/admin/branch')}}" class="btn btn-success">Back to Branch</a>
<br><br>
<div class="row">
    <div class="col-lg-12 col-md-12">
        @include('admin.layouts.message')
        <div class="card">
            <div class="header">
                <h4 class="title">Add Branch</h4>
            </div>
            <div class="content">
                {!!Form::open(['url'=>'/admin/branch'])!!} 
                    <div class="row">
                        <div class="col-md-12">
                            @include('admin.branch._field')
                            <div class="form-group">
                                {{ Form::submit('Add Branch',['class'=>'btn btn-info btn-fill btn-wd'])}}
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
