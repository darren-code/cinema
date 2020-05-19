@extends('admin.layouts.master')

@section('page')
    Add Studio Allocation
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        @include('admin.layouts.message')
        <div class="row">
            <div class="col mb-3">
                <a href="{{ url('admin/playing') }}" class="btn btn-primary float-left">Back to Allocation</a>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h4 class="title">Add Studio Allocation</h4>
            </div>
            <div class="content">
                {!!Form::open(['url'=>'/admin/playing'])!!} 
                    <div class="row">
                        <div class="col-md-12">
                            @include('admin.playing.field')
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