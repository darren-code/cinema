<div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
    {{ Form::label('name','Actor/Actress Name:')}}
    {{ Form::text('name',$data->name,['class'=>'form-control border-input','placeholder'=>'Leonardo DiCaprio'])}}
    <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('birthplace') ? 'has-error' :'' }}">
    {{ Form::label('birthplace','Birthplace:')}}
    {{ Form::text('birthplace',$data->birthplace,['class'=>'form-control border-input','placeholder'=>'Hollywood, California, USA'])}}
    <span class="text-danger">{{$errors->has('birthplace') ? $errors->first('birthplace') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('birthdate') ? 'has-error' :'' }}">
    {{ Form::label('birthdate','Birthdate:')}}
    {{ Form::date('birthdate',$data->birthdate,['class'=>'form-control border-input','placeholder'=>'Leonardo DiCaprio','max'=>date("Y-m-d")])}}
    <span class="text-danger">{{$errors->has('birthdate') ? $errors->first('birthdate') : ''}} </span>
</div>