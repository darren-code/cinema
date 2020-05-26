@extends('admin.layouts.master')

@section('page')
    Movie Details
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col mb-3">
                <a href="{{ url('admin/movies') }}" class="btn btn-primary float-left">Back to movies</a>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h4 class="title">Movie Details</h4>
                <p class="category">List of stock</p>
            </div>
            <div class="content table-responsive">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{$movies->id}}</td>
                        </tr>

                        <tr>
                            <th>Title</th>
                            <td>{{$movies->title}}</td>
                        </tr>

                        <tr>
                            <th>Genre</th>
                            <td>
                                @if(isset($genre[0]))
                                @php
                                    $panjang = count($genre);
                                @endphp
                                @foreach($genre as $genres=>$g)
                                    {{$g->genre}}
                                    @if($genres!==($panjang-1))
                                        , 
                                    @endif
                                @endforeach
                                @else
                                    No genre yet... <pre></pre>
                                    {{ link_to_route('genrerelation.create', "Add Genre Relation", '', ['class' => 'btn btn-info']) }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Director</th>
                            <td>{{$movies->director}}</td>
                        </tr>

                        <tr>
                            <th>Availability</th>
                            <td>
                                @if($movies->avail==0)
                                    Not Showing (Archive)
                                @elseif($movies->avail==1)
                                    Now Showing 
                                @elseif($movies->avail==2)
                                    Coming Soon
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Date Released</th>
                            <td>{{$movies->released}}</td>
                        </tr>

                        <tr>
                            <th>Film Consent</th>
                            <td>
                                @if($movies->parental==0)
                                    General
                                @elseif($movies->parental==10)
                                    Parental Guidance
                                @elseif($movies->parental==13)
                                    Parental Guidance Above 13
                                @elseif($movies->parental==16)
                                    Restricted
                                @elseif($movies->parental==18)
                                    No One Under 17
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Image</th>
                            <td><img src="{{ route('movie.poster', ['filename' => $movies->poster]) }}" alt="" class="img-thumbnail" style="width: 150px;">
                            </td>
                        </tr>

                        <tr>
                            <th>Synopsis</th>
                            <td>{{$movies->synopsis}}</td>
                        </tr>

                        <tr>
                            <th>Trailer</th>
                            <td>
                                <iframe width="420" height="315" src="{{$movies->trailer}}">
                                </iframe>
                            </td>
                        </tr>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>
@endsection
