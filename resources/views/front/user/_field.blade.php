<div class="form-group {{ $errors->has('firstname') ? 'has-error' :'' }}">
    {{ Form::label('firstname','First Name:')}}
    {{ Form::text('firstname',$user->firstname,['class'=>'form-control border-input','placeholder'=>'John'])}}
    <span class="text-danger">{{$errors->has('firstname') ? $errors->first('firstname') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('lastname') ? 'has-error' :'' }}">
    {{ Form::label('lastname','Last Name:')}}
    {{ Form::text('lastname',$user->lastname,['class'=>'form-control border-input','placeholder'=>'Doe'])}}
    <span class="text-danger">{{$errors->has('lastname') ? $errors->first('lastname') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('gender') ? 'has-error' :'' }}">
    {{ Form::label('gender','Last Name:')}}
    {{ Form::text('gender',$user->gender,['class'=>'form-control border-input','placeholder'=>'Female'])}}
    <span class="text-danger">{{$errors->has('gender') ? $errors->first('gender') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' :'' }}">
    {{ Form::label('phone','Phone Number:')}}
    {{ Form::text('phone',$user->phone,['class'=>'form-control border-input','placeholder'=>'62775'])}}
    <span class="text-danger">{{$errors->has('phone') ? $errors->first('phone') : ''}} </span>
</div>



