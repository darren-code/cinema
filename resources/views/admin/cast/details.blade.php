@extends('admin.layouts.master')

@section('page')
    Cast Details    
@endsection

@section('content')
<a href="{{url('/admin/cast')}}" class="btn btn-success">Back to Cast</a>
<br><br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Cast Details</h4>
            </div>
            <div class="content table-responsive">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Cast ID</th>
                            <td>{{$data->id}}</td>
                        </tr>
                        <tr>
                            <th>Actor/Actress Name</th>
                            <td>{{$data->name}}</td>
                        </tr>
                        <tr>
                            <th>Birthplace</th>
                            <td>{{$data->birthplace}}</td>
                        </tr>
                        <tr>
                            <th>Birthdate</th>
                            <td>{{$data->birthdate}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Movie has been casted by this Actor/Actress</h4>
            </div>
            <div class="content table-responsive">
            @if(isset($cast_relation[0]))
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Movie ID</th>
                            <th>Title</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cast_relation as $cast_relation => $t)
                            <tr>
                                <td>{{$t->id}}</td>
                                <td>{{$t->title}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p class="text-center">
                        No Ticket booked yet
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection