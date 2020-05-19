<div class="form-group {{ $errors->has('location') ? 'has-error' :'' }}">
    {{ Form::label('location','Branch Location:')}}
    {{ Form::text('location',$movies->location,['class'=>'form-control border-input','placeholder'=>'Pondok Indah Mall'])}}
    <span class="text-danger">{{$errors->has('location') ? $errors->first('location') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('country') ? 'has-error' :'' }}">
    {{ Form::label('country','Branch Country:')}}
    {{ Form::text('country',$movies->country,['class'=>'form-control border-input','placeholder'=>'United States'])}}
    <span class="text-danger">{{$errors->has('country') ? $errors->first('country') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('state') ? 'has-error' :'' }}">
    {{ Form::label('state','Branch State:')}}
    {{ Form::text('state',$movies->state,['class'=>'form-control border-input','placeholder'=>'California'])}}
    <span class="text-danger">{{$errors->has('state') ? $errors->first('state') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('province') ? 'has-error' :'' }}">
    {{ Form::label('province','Branch Province:')}}
    {{ Form::text('province',$movies->province,['class'=>'form-control border-input','placeholder'=>'Minnesotta'])}}
    <span class="text-danger">{{$errors->has('province') ? $errors->first('province') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('town') ? 'has-error' :'' }}">
    {{ Form::label('town','Branch Town:')}}
    {{ Form::text('town',$movies->town,['class'=>'form-control border-input','placeholder'=>'New Jersey'])}}
    <span class="text-danger">{{$errors->has('town') ? $errors->first('town') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('zip_code') ? 'has-error' :'' }}">
    {{ Form::label('zip_code','Branch Zip Code:')}}
    {{ Form::text('zip_code',$movies->zip_code,['class'=>'form-control border-input','placeholder'=>'23124'])}}
    <span class="text-danger">{{$errors->has('zip_code') ? $errors->first('zip_code') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' :'' }}">
    {{ Form::label('address','Branch Address:')}}
    {{ Form::text('address',$movies->address,['class'=>'form-control border-input','placeholder'=>''])}}
    <span class="text-danger">{{$errors->has('address') ? $errors->first('address') : ''}} </span>
</div>

