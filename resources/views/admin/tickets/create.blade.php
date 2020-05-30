@extends('admin.layouts.master')

@section('page')
    Add Ticket
@endsection

@section('content')
<a href="{{url('/admin/ticket')}}" class="btn btn-success">Back to Tickets</a>
<br><br>
<div class="row">
    <div class="col-lg-12 col-md-12">
        @include('admin.layouts.message')
        <div class="card">
            <div class="header">
                <h4 class="title">Add Ticket</h4>
            </div>
            <div class="content">
                {!!Form::open(['url'=>'/admin/ticket'])!!} 
                    <div class="row">
                        <div class="col-md-12">
                            @php 
                                $trx_id = 0;
                                $pl_id = 0;
                            @endphp

                            <div class="form-group {{ $errors->has('seat') ? 'has-error' :'' }}">
                                {{ Form::label('seat','Seat:')}}
                                {{ Form::text('seat','',['class'=>'form-control border-input','placeholder'=>'B10'])}}
                                <span class="text-danger">{{$errors->has('seat') ? $errors->first('seat') : ''}} </span>
                            </div>

                            <div class="form-group {{ $errors->has('cost') ? 'has-error' :'' }}">
                                {{ Form::label('cost','Cost:')}}
                                {{ Form::text('cost','',['class'=>'form-control border-input','placeholder'=>'40000'])}}
                                <span class="text-danger">{{$errors->has('cost') ? $errors->first('cost') : ''}} </span>
                            </div>



                            <div class="form-group {{ $errors->has('transaction') ? 'has-error' :'' }}">
                                {{ Form::label('transaction','Transaction ID:')}}
                                <select class="form-control border-input" name="transaction">
                                    @php 
                                        if($trx_id==0){
                                            echo "<option value='' selected>Choose it</option>";
                                        }
                                    @endphp
                                    @foreach($data_transaction as $data_transaction => $s)
                                        <option value="{{$s->id}}" {{ $trx_id == $s->id ? 'selected': ''}}>
                                            {{$s->id}}
                                        </option>
                                    @endforeach
                                    
                                </select>
                                <span class="text-danger">{{$errors->has('transaction') ? $errors->first('transaction') : ''}} </span>
                            </div>

                            <div class="form-group {{ $errors->has('playing') ? 'has-error' :'' }}">
                                {{ Form::label('playing','Playing ID:')}}
                                <select class="form-control border-input" name="playing">
                                    @php 
                                        if($pl_id==0){
                                            echo "<option value='' selected>Choose it</option>";
                                        }
                                    @endphp
                                    @foreach($data_playing as $data_playing => $s)
                                        <option value="{{$s->id}}" {{ $pl_id == $s->id ? 'selected': ''}}>
                                            {{$s->id}}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('playing') ? $errors->first('playing') : ''}} </span>
                            </div>
                            <div class="form-group">
                                {{ Form::submit('Add Ticket',['class'=>'btn btn-info btn-fill btn-wd'])}}
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
