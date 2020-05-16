@extends('admin.layouts.master')

@section('page')
    Studio Details   
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Studio {{$title[0]->name}} History</h4>
            </div>
            <div class="content table-responsive table-full-width">
                @if(isset($studio[0]))
                    @foreach ($studio as $studio => $value)
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th style="padding-left: 5em">Movie Title</th>
                                <td>{{$value->title}}</td>
                            </tr>
                            <tr>
                                <th style="padding-left: 5em">Air Time</th>
                                <td>{{$value->time}}</td>
                            </tr>
                            <tr>
                                <th style="padding-left: 5em">Seat Layout</th>
                                <td>
                                    {{link_to_route('studio.seat','Details',array($value->id,$value->time),['class'=>'btn btn-success btn-sm'])}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @endforeach
                @else
                    <p class="text-center">
                        No History yet
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection