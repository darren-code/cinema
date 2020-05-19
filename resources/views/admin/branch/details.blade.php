@extends('admin.layouts.master')

@section('page')
    Airtime Details
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col mb-3">
                <a href="{{ url('admin/showtime') }}" class="btn btn-primary float-left">Back to Airtime</a>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h4 class="title">Airtime Details</h4>
                <p class="category">Airtime: {{$data->time}} </p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    @if(isset($showtime[0]))
                    <thead>
                        <tr>
                            <th>Studio Name</th>
                            <th>Studio Class</th>
                            <th>Studio Location</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($showtime as $showtime => $value)
                            <tr>
                                <td>
                                    {{$value->name}}
                                </td>
                                <td>
                                    @if($value->class==1)
                                        Premiere
                                    @elseif($value->class==2)
                                        Classic
                                    @endif
                                </td>
                                <td>
                                    {{$value->location}}
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                    @else
                        <p class="text-center">
                            No Studio Allocated yet
                            <br>
                        </p>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
