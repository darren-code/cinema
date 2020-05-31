@php 
    if(isset($data)){
        $mov_id = $data->movie;
        $cast_id = $data->cast;
    } else{
        $mov_id = 0;
        $cast_id = 0;
    }
@endphp
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

<div class="form-group {{ $errors->has('cast') ? 'has-error' :'' }}">
    {{ Form::label('cast','Actor/Actress Name:')}}
    <select class="form-control border-input" name="cast">
        @php 
            if($cast_id==0){
                echo "<option value='' selected>Choose it</option>";
            }
        @endphp
        @foreach($data_cast as $data_cast => $s)
            <option value="{{$s->id}}" {{ $cast_id == $s->id ? 'selected': ''}}>
                {{$s->name}}
            </option>
        @endforeach
    </select>
    <span class="text-danger">{{$errors->has('cast') ? $errors->first('cast') : ''}} </span>
</div>
