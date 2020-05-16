<div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
    {{ Form::label('name','Studio Name:')}}
    {{ Form::text('name',$studio->name,['class'=>'form-control border-input','placeholder'=>'Uranus'])}}
    <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('class') ? 'has-error' :'' }}">
    {{ Form::label('class','Class:') }}
    {{Form::select('class', ['1' => 'Premiere','2'=>'Classic'], $studio->class, ['class'=>'form-control border-input','placeholder' => 'Pick it...'])}}
    <span class="text-danger">{{$errors->has('class') ? $errors->first('class') : ''}} </span>
</div>



