@php
    if(isset($order->id)){
        $user_id = $data_user[0]->id;
    } else{
        $user_id = 0;
    }
@endphp
<div class="form-group {{ $errors->has('total') ? 'has-error' :'' }}">
    {{ Form::label('total','Total Price:')}}
    {{ Form::text('total',$order->total,['class'=>'form-control border-input','placeholder'=>'150000'])}}
    <span class="text-danger">{{$errors->has('total') ? $errors->first('total') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('method') ? 'has-error' :'' }}">
    {{ Form::label('method','Availability:') }}
    {{Form::select('method', ['Gopay' => 'Gopay' , 'OVO' => 'OVO','Debit Card'=>'Debit Card','Credit Card'=>'Credit Card'], $order->method, ['class'=>'form-control border-input','placeholder' => 'Pick it...'])}}
    <span class="text-danger">{{$errors->has('method') ? $errors->first('method') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('isPaid') ? 'has-error' :'' }}">
    {{ Form::label('isPaid','Status:') }}
    {{Form::select('isPaid', [0 => 'Not Paid Yet' , 1 => 'Paid Already'], $order->isPaid, ['class'=>'form-control border-input','placeholder' => 'Pick it...'])}}
    <span class="text-danger">{{$errors->has('isPaid') ? $errors->first('isPaid') : ''}} </span>
</div>

<div class="form-group {{ $errors->has('user') ? 'has-error' :'' }}">
    {{ Form::label('user','Username :') }}
    <select class="form-control border-input" name="user">
        @php 
            if($user_id==0){
                echo "<option value='' selected>Choose it</option>";
            }
        @endphp
        @foreach($data_user as $data_user => $s)
            <option value="{{$s->id}}" {{ $user_id == $s->id ? 'selected': ''}}>
                {{$s->username}}
            </option>
        @endforeach
    </select>
    <span class="text-danger">{{$errors->has('user') ? $errors->first('user') : ''}} </span>
</div>


