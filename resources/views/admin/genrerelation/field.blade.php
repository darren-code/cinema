@php 
    if(isset($data)){
        $mov_id = $data->movie;
        $genre_id = $data->genre;
    } else{
        $genre_id = 0;
        $mov_id = 0;
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

<div class="form-group {{ $errors->has('genre') ? 'has-error' :'' }}">
    {{ Form::label('genre','Genre Movie:')}}
    <select class="form-control border-input" name="genre">
        @php 
            if($mov_id==0){
                echo "<option value='' selected>Choose it</option>";
            }
        @endphp
        @foreach($data_genre as $data_genre => $s)
            <option value="{{$s->id}}" {{ $genre_id == $s->id ? 'selected': ''}}>
                {{$s->genre}}
            </option>
        @endforeach
    </select>
    <span class="text-danger">{{$errors->has('genre') ? $errors->first('genre') : ''}} </span>
</div>
