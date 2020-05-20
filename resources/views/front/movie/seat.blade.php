@extends('layouts.app')

@section('title')
    {{ $movie->title }}
@endsection

{{-- @section('header') --}}
@section('content')
<form action="{{-- route('') --}}" accept-charset="utf-8" method="post">
    <div class="row mt-4">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('movie.details', ['id' => $movie->id, 'branch' => Session::get('location')]) }}">{{ $movie->title }}</a></li>
                    <li class="breadcrumb-item active"><a href="#">{{ date('G.i', strtotime($time)) }}</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-3">
            @if (Storage::disk('local')->has('poster/' . $movie->poster))
                <img class="img-fluid img-thumbnail rounded" src="{{ route('movie.poster', ['filename' => $movie->poster]) }}" alt="{{ $movie->title }}">
            @endif
            <h1 class="text-center">{{ $movie->title }}</h1>
            <h4 class="text-center">{{ DateTime::createFromFormat("Y-m-d", $movie->released)->format("Y") }}</h4>
            <div class="dropdown-divider"></div>
        </div>

        <div class="col-lg-9">
            <div class="mb-3 list-group list-group-horizontal-md" role="tablist">
                @foreach ($shows as $row)
                    <a class="list-group-item list-group-item-action" id="studio-{{ $row->name }}-tab" data-toggle="pill" href="#studio-{{ $row->name }}" role="tab">
                        Studio {{ $row->name }}
                        <span class="badge badge-primary badge-pill float-right">16</span>
                    </a>
                @endforeach
                {{-- <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                </li> --}}
            </div>
            <div class="tab-content">
                @foreach ($shows as $row)
                    <div class="tab-pane fade" id="studio-{{ $row->name }}" role="tabpanel" aria-labelledby="studio-{{ $row->name }}-tab">
                        
                        {{-- Seat Layout Settings --}}

                        @if ($row->class == 1)
                            @php
                                $side = 8;
                                $center = 24;
                                $class = 'deluxe';
                            @endphp
                        @else
                            @php
                                $side = 16;
                                $center = 48;
                                $class = 'classic';
                            @endphp
                        @endif

                        {{-- Seat Layout Preview --}}
                        
                        <div class="row justify-content-between">
                            <div class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-xs-3">
                                <h4 class="d-lg-none d-md-none d-xl-none text-center pb-3 text-danger">Left Row</h4>
                                <div class="row mr-md-auto">
                                    @for ($i = 0; $i < $side; $i++)
                                    <div class="col-6 pb-3">
                                        <input type="checkbox" class="seat {{ $class }}" data-on="Booked" data-off="A{{ $i }}" data-onstyle="danger" data-toggle="toggle" data-size="sm">
                                    </div>
                                    @endfor
                                </div>
                            </div>

                            <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-xs-6">
                                <h4 class="d-lg-none d-md-none d-xl-none text-center pb-3 text-success">Center Row</h4>
                                <div class="row mx-md-auto">
                                    @for ($i = 0; $i < $center; $i++)
                                        <div class="col-2 pb-3">
                                        <input type="checkbox" class="seat {{ $class }}" data-row="B" data-seat="{{ $i }}"
                                            data-on="Booked" data-off="B{{ $i }}" data-onstyle="success" data-toggle="toggle" data-size="sm"/>
                                        </div>
                                    @endfor
                                </div>
                            </div>

                            <div class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-xs-3">
                                <h4 class="d-lg-none d-md-none d-xl-none text-center pb-3 text-primary">Right Row</h4>
                                <div class="row ml-md-auto">
                                    @for ($i = 0; $i < $side; $i++)
                                    <div class="col-6 pb-3">
                                        <input type="checkbox" class="seat {{ $class }}" data-on="Booked" data-off="C{{ $i }}" data-onstyle="primary" data-toggle="toggle" data-size="sm">
                                    </div>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <div class="dropdown-divider"></div>

                        <div class="d-flex justify-content-center bg-primary rounded">
                            <h2 class="text-center text-light">
                                Screen
                            </h2>
                        </div>

                        <div class="dropdown-divider"></div>
                    </div>
                @endforeach
                {{-- <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">A0</div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">A1</div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">A2</div> --}}
            </div>
            <div class="row">
                    <div class="col">
                        <h5>Total</h5>
                        <span class="total"></span>
                    </div>
                    <div class="col">
                        <button data-target="#payment" data-toggle="modal" type="button" class="mb-3 btn btn-danger float-right">Proceed to Payment <i class="fad fa-credit-card"></i></button>
                        <div class="modal fade" id="payment" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Finalization</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary">Check Out</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-lg-3">

        </div>
        <div class="col-lg-9">
            <!-- Sebelumnya disini -->
        </div>
    </div>
</form>
@endsection

@section('script')
<script>
    let formatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
    });

    $(document).ready(() => {
        $('input[type="checkbox"].seat').change(() => {
            let lux = $('input.seat.deluxe:checked').length * 75000; // Premiere Price
            let std = $('input.seat.classic:checked').length * 50000; // Standard Price
            $('span.total').html(formatter.format(lux + std))
        });
    });
</script>
@endsection

{{-- @section('footer') --}}