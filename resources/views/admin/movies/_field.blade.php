<div class="form-group {{ $errors->has('title') ? 'has-error' :'' }}">
    {{ Form::label('title','Movie Title:')}}
    {{ Form::text('title',$movies->title,['class'=>'form-control border-input','placeholder'=>'Avenger - Endgame'])}}
    <span class="text-danger">{{$errors->has('title') ? $errors->first('title') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('director') ? 'has-error' :'' }}">
    {{ Form::label('director','Movie Director:') }}
    {{ Form::text('director',$movies->director,['class'=>'form-control border-input','placeholder'=>'Steven Spielberg'])}}
    <span class="text-danger">{{$errors->has('director') ? $errors->first('director') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('avail') ? 'has-error' :'' }}">
    {{ Form::label('avail','Availability:') }}
    {{Form::select('avail', ['0' => 'Not Showing (Archive)' , '1' => 'Now Showing','2'=>'Coming Soon'], $movies->avail, ['class'=>'form-control border-input','placeholder' => 'Pick it...'])}}
    <span class="text-danger">{{$errors->has('avail') ? $errors->first('avail') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('released') ? 'has-error' :'' }}">
    {{ Form::label('released','Date Release :') }}
    {{{ Form::date('released', $movies->released, ['class'=>'form-control border-input']) }}}
    <span class="text-danger">{{$errors->has('released') ? $errors->first('released') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('parental') ? 'has-error' :'' }}">
    {{ Form::label('parental','Film Consent :') }}
    {{Form::select('parental', ['0' => 'General','10' => 'Parental Guidance','13' => 'Parental Guidance Above 13','16' => 'Restricted','18' => 'No One Under 17'], $movies->parental, ['class'=>'form-control border-input','placeholder' => 'Pick it...'])}}
    <span class="text-danger">{{$errors->has('parental') ? $errors->first('parental') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('synopsis') ? 'has-error' :'' }}">
    {{ Form::label('synopsis','Movie Synopsis:')}}
    {{ Form::textarea('synopsis',$movies->synopsis,['class'=>'form-control border-input','placeholder'=>'Impeccable start could define a good movies.'])}}
    <span class="text-danger">{{$errors->has('synopsis') ? $errors->first('synopsis') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('poster') ? 'has-error' :'' }}">
    {{ Form::label('poster','Movie Image :')}}
    {{ Form::file('poster',['class'=>'form-control border-input','id'=>'poster'])}}
    <span class="text-danger">{{$errors->has('poster') ? $errors->first('poster') : ''}} </span>
    <div id="thumb-output"></div>
</div>

<div class="form-group {{ $errors->has('trailer') ? 'has-error' :'' }}">
    {{ Form::label('trailer','Movie Trailer:') }}
    {{ Form::text('trailer',$movies->trailer,['class'=>'form-control border-input','placeholder'=>'Put the link here...'])}}
    <span class="text-danger">{{$errors->has('trailer') ? $errors->first('trailer') : ''}} </span>
</div>


