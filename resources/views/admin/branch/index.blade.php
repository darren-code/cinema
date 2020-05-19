@extends('admin.layouts.master')

@section('page')
    Branch
@endsection

@section ('content')
<div class="row">
    <div class="col-md-12">
        @include('admin.layouts.message')
        <div class="row">
            <div class="col mb-3">
                {{ link_to_route('branch.create', "Add Branch", '', ['class' => 'btn btn-info float-right']) }}
            </div>
        </div>
        <div class="card"> 
            <div class="header">
                <h4 class="title">All Branch</h4>
                <p class="category">List of all Branch</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Branch Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($branch as $b)
                            <tr>
                                <td>{{ $b->id }}</td>
                                <td>{{ $b->location }}</td>
                                <td>
                                    {{Form::open(['route'=>['branch.destroy',$b->id],'method'=>'DELETE'])}}
                                        {{link_to_route('branch.show','',$b->id,['class'=>'btn btn-info btn-sm fad fa-info-square'])}}
                                        {{link_to_route('branch.edit','',$b->id,['class'=>'btn btn-info btn-sm fad fa-edit']) }}
                                        {{Form::button('',['class'=>'btn btn-danger btn-sm fad fa-trash-alt','type'=>'submit','onclick'=>'return confirm("Are you sure you want to delete this?")'])}}
                                    {{Form::close()}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
