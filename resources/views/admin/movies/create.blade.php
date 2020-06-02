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
                            @php 
                                if(isset($playing[0])){
                                    $studio_id = $playing[0]->studio_id;
                                    $st_id = $playing[0]->st_id;
                                    $loc_id = $playing[0]->loc_id;

                                } else{
                                    $studio_id = 0;
                                    $mov_id = 0;
                                    $st_id = 0;
                                    $loc_id = 0;
                                }
                            @endphp
                            Below is required if Availability in Now Showing!
                            <div class="form-group {{ $errors->has('showtime') ? 'has-error' :'' }}">
                                {{ Form::label('showtime','Airtime :')}}
                                <select class="form-control border-input" name="showtime">
                                    @php 
                                        if($st_id==0){
                                            echo "<option value='' selected>Choose it</option>";
                                        }
                                    @endphp
                                    @foreach($data_showtime as $data_showtime => $s)
                                        <option value="{{$s->id}}" {{ $st_id == $s->id ? 'selected': ''}}>
                                            {{substr($s->time,0,5)}}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('showtime') ? $errors->first('showtime') : ''}} </span>
                            </div>

                            <div class="form-group {{ $errors->has('studio') ? 'has-error' :'' }}">
                                {{ Form::label('studio','Studio Name:')}}
                                <select class="form-control border-input" name="studio">
                                    @php 
                                        if($studio_id==0){
                                            echo "<option value='' selected>Choose it</option>";
                                        }
                                    @endphp
                                    @foreach($data_studio as $data_studio => $s)
                                        <option value="{{$s->id}}" {{ $studio_id == $s->id ? 'selected': ''}}>
                                            {{$s->name}}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('studio') ? $errors->first('studio') : ''}} </span>
                            </div>

                            <div class="form-group {{ $errors->has('branch') ? 'has-error' :'' }}">
                                {{ Form::label('branch','Branch Location:')}}
                                <select class="form-control border-input" name="branch">
                                    @php 
                                        if($loc_id==0){
                                            echo "<option value='' selected>Choose it</option>";
                                        }
                                    @endphp
                                    @foreach($data_branch as $data_branch => $s)
                                        <option value="{{$s->id}}" {{ $loc_id == $s->id ? 'selected': ''}}>
                                            {{$s->location}}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('branch') ? $errors->first('branch') : ''}} </span>
                            </div>

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

@section('script')

@endsection