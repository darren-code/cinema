<div class="form-group {{ $errors->has('studio') ? 'has-error' :'' }}">
    {{ Form::label('studio','Studio Name:')}}
    <select class="form-control border-input" name="studio">
        <option value="" selected="selected">Choose It</option>
        @foreach($data_studio as $data_studio => $s)
            <option value="{{$s->id}}">
                {{$s->name}}
            </option>
        @endforeach
    </select>
    <span class="text-danger">{{$errors->has('studio') ? $errors->first('studio') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('movie') ? 'has-error' :'' }}">
    {{ Form::label('movie','Movie Title:')}}
    <select class="form-control border-input" name="movie">
        <option value="" selected="selected">Choose It</option>
        @foreach($data_movie as $data_movie => $s)
            <option value="{{$s->id}}">
                {{$s->title}}
            </option>
        @endforeach
    </select>
    <span class="text-danger">{{$errors->has('movie') ? $errors->first('movie') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('showtime') ? 'has-error' :'' }}">
    {{ Form::label('showtime','Airtime:')}}
    <select class="form-control border-input" name="showtime">
        <option value="" selected="selected">Choose It</option>
        @foreach($data_showtime as $data_showtime => $s)
            <option value="{{$s->id}}">
                {{$s->time}}
            </option>
        @endforeach
    </select>
    <span class="text-danger">{{$errors->has('showtime') ? $errors->first('showtime') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('branch') ? 'has-error' :'' }}">
    {{ Form::label('branch','Branch Location:')}}
    <select class="form-control border-input" name="branch">
        <option value="" selected="selected">Choose It</option>
        @foreach($data_branch as $data_branch => $s)
            <option value="{{$s->id}}">
                {{$s->location}}
            </option>
        @endforeach
    </select>
    <span class="text-danger">{{$errors->has('branch') ? $errors->first('branch') : ''}} </span>
</div>

<div class="form-group">
    {{ Form::submit('Add Studio Allocation',['class'=>'btn btn-info btn-fill btn-wd'])}}
</div>