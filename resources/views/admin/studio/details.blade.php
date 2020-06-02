@extends('admin.layouts.master')

@section('page')
    Studio Details   
@endsection

@section('content')
<a href="{{url('/admin/studio')}}" class="btn btn-success">Back to Studio</a>
<br><br>
<div class="row">
    <div class="col-md-12">
        <div class="card col-12">
            <div class="header">
                <h4 class="title">Studio {{$title[0]->name}} History</h4>
                @if(isset($studio[0]))
                <p class="category">Branch: {{$studio[0]->location}} </p>
                @endif
            </div>
            <div class="content table-responsive table-full-width">
                @if(isset($studio[0]))
                    @foreach ($studio as $studio => $value)
                    <div class="card col-12">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th style="padding-left: 5em">Movie Title</th>
                                    <td align="right">{{$value->title}}</td>
                                </tr>
                                <tr>
                                    <th style="padding-left: 5em">Air Time</th>
                                    <td align="right">{{$value->time}}</td>
                                </tr>
                                <tr>
                                    <th style="padding-left: 5em">Seat Layout</th>
                                    <td align="right">
                                        {{link_to_route('studio.seat','Details',array($value->pr_id,$value->time),['class'=>'btn btn-success btn-sm'])}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endforeach
                @else
                    <p class="text-center">
                        Studio is not used.
                        <br>
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection