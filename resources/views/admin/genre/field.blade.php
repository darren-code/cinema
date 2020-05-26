<div class="form-group {{ $errors->has('genre') ? 'has-error' :'' }}">
    {{ Form::label('genre','Genre:')}}
    {{ Form::text('genre',$data->genre,['class'=>'form-control border-input','placeholder'=>'Horror'])}}
    <span class="text-danger">{{$errors->has('genre') ? $errors->first('genre') : ''}} </span>
</div>
