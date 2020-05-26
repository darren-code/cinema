@extends('admin.layouts.master')

@section('page')
    Branch Details
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col mb-3">
                <a href="{{ url('admin/branch') }}" class="btn btn-primary float-left">Back to Branch</a>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h4 class="title">Branch Information</h4>
            </div>
            <div class="content table-responsive">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>ID Branch</th>
                            <td>{{$data->id}}</td>
                        </tr>

                        <tr>
                            <th>Branch Location</th>
                            <td>{{$data->location}}</td>
                        </tr>

                        <tr>
                            <th>Branch Country</th>
                            <td>{{$data->country}}</td>
                        </tr>

                        <tr>
                            <th>Branch State</th>
                            <td>{{$data->state}}</td>
                        </tr>

                        <tr>
                            <th>Branch Province</th>
                            <td>{{$data->province}}</td>
                        </tr>

                        <tr>
                            <th>Branch Town</th>
                            <td>{{$data->town}}</td>
                        </tr>

                        <tr>
                            <th>Branch Zip Code</th>
                            <td>{{$data->zip_code}}</td>
                        </tr>

                        <tr>
                            <th>Branch Address</th>
                            <td>{{$data->address}}</td>
                        </tr>
                    </tbody>

                </table>

            </div>
        </div>
        <div class="card">
            <div class="header">
                <h4 class="title">Studio(s) in Branch </h4>
            </div>
            <div class="content table-responsive ">
                <table class="table table-striped">
                    @if(isset($branch[0]))
                    <thead>
                        <tr>
                            <th>Studio Name</th>
                            <th>Studio Class</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($branch as $branch => $value)
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
                            </tr>
                            @endforeach
                    </tbody>
                    @else
                        <p class="text-center">
                            No Studio found.
                            <br>
                        </p>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
