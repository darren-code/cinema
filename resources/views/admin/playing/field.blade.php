@php 
    if(isset($playing[0])){
        $studio_id = $playing[0]->studio_id;
        $mov_id = $playing[0]->mov_id;
        $st_id = $playing[0]->st_id;
        $loc_id = $playing[0]->loc_id;

    } else{
        $studio_id = 0;
        $mov_id = 0;
        $st_id = 0;
        $loc_id = 0;
    }
@endphp

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

<div class="form-group {{ $errors->has('movie') ? 'has-error' :'' }}">
    {{ Form::label('movie','Movie Title:')}}
    <select class="form-control border-input" name="movie">
        @php 
            if($mov_id==0){
                echo "<option value='' selected>Choose it</option>";
            }
        @endphp
        @foreach($data_movie as $data_movie => $s)
            <option value="{{$s->id}}" {{ $mov_id == $s->id ? 'selected': ''}}>
                {{$s->title}}
            </option>
        @endforeach
    </select>
    <span class="text-danger">{{$errors->has('movie') ? $errors->first('movie') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('showtime') ? 'has-error' :'' }}">
    {{ Form::label('showtime','Airtime:')}}
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
