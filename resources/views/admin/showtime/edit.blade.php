@extends('admin.layouts.master')

@section('page')
    Edit Airtime
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        @include('admin.layouts.message')
        <div class="row">
            <div class="col mb-3">
                <a href="{{ url('admin/showtime') }}" class="btn btn-primary float-left">Back to Airtime</a>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h4 class="title">Edit Airtime</h4>
            </div>
            <div class="content">
                {{ Form::open(['url'=>[ 'admin/showtime',$showtime->id], 'method' => 'put']) }} 
                    <div class="row">
                        <div class="col-md-12">
                            @include('admin.showtime._field')
                            <div class="form-group">
                                {{ Form::submit('Update Airtime', ['class'=>'btn btn-info btn-fill btn-wd']) }}
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
