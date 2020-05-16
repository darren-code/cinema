@extends('admin.layouts.master')

@section('page')
Studio Layout
@endsection

@section('content')
<a href="{{url('/admin/studio/details/'.$title[0]->id)}}" class="btn btn-success">Back to Studio</a>
<br><br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Studio {{$title[0]->name." - ".$title[0]->title." - ".$title[0]->time}} </h4>
            </div>
            <div class="content table-responsive table-full-width">
                @if(isset($studio[0]))
                    @foreach ($studio as $studio => $value)
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th style="padding-left: 5em">Row</th>
                                <td>{{$value->row}}</td>
                            </tr>
                            <tr>
                                <th style="padding-left: 5em">Seat</th>
                                <td>{{$value->seat}}</td>
                            </tr>
                        </tbody>
                    </table>
                    @endforeach

                @else
                    <p class="text-center">
                        No ticket has been ordered.                    
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection