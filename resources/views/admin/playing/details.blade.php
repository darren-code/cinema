@extends('admin.layouts.master')

@section('page')
    Allocation Studio Details   
@endsection

@section('content')
<a href="{{url('/admin/playing')}}" class="btn btn-success">Back to Allocation Studio</a>
<br><br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Allocation Studio Details</h4>
            </div>
            <div class="content table-responsive">
                <div class="card col-12">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th style="padding-left: 5em">Allocation ID</th>
                            <td align="right">{{$playing[0]->id}}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 5em">Movie Title</th>
                            <td align="right">
                                {{link_to_route('movies.show',$playing[0]->title,$playing[0]->studio_id,[])}}
                            </td>
                        </tr>
                        <tr>
                            <th style="padding-left: 5em">Studio</th>
                            <td align="right">
                                {{link_to_route('studio.show',$playing[0]->name,$playing[0]->studio_id,[])}}
                            </td>
                        </tr>
                        <tr>
                            <th style="padding-left: 5em">Airtime</th>
                            <td align="right">{{ substr($playing[0]->time,0,5)}}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 5em">Branch Location</th>
                            <td align="right">{{$playing[0]->location}}</td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection