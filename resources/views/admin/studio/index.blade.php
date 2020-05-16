@extends('admin.layouts.master')

@section('page')
    Studios   
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Studios</h4>
                <p class="category">List of all studios</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($studio as $s)
                        <tr>
                            <td>{{$s->id}}</td>
                            <td>{{$s->name}}</td>
                            <td>
                            @if($s->class==1)
                                Premiere
                            @elseif($s->class==2)
                                Classic
                            @endif
                            </td>
                            <td>
                                {{link_to_route('studio.details','Details',$s->id,['class'=>'btn btn-success btn-sm'])}}
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