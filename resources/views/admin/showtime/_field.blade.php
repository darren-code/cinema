<div class="form-group {{ $errors->has('time') ? 'has-error' :'' }}">
    {{ Form::label('time','Airtime:')}}
    <input class="form-control border-input timepicker" type="time" name="time" value="{{$showtime->time}}" >
    <span class="text-danger">{{$errors->has('time') ? $errors->first('time') : ''}} </span>
</div>

