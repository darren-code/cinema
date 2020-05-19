@extends('admin.layouts.master')

@section('page')
    Add Airtime
@endsection

@section('content')
<a href="{{url('/admin/showtime')}}" class="btn btn-success">Back to Airtime</a>
<br><br>
<div class="row">
    <div class="col-lg-12 col-md-12">
        @include('admin.layouts.message')
        <div class="card">
            <div class="header">
                <h4 class="title">Add Airtime</h4>
            </div>
            <div class="content">
                {!!Form::open(['url'=>'/admin/showtime'])!!} 
                    <div class="row">
                        <div class="col-md-12">
                            @include('admin.showtime._field')
                            <div class="form-group">
                                {{ Form::submit('Add Airtime',['class'=>'btn btn-info btn-fill btn-wd'])}}
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
