@extends('layouts.app')

@section('title')
    {{ $movie->title }}
@endsection

{{-- @section('header') --}}
@section('content')
<form accept-charset="utf-8" method="post" action="{{ route('user.book') }}">
    @csrf
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
                        <span id="remain" class="badge badge-primary badge-pill float-right {{ $row->class == 1 ? 'deluxe' : 'classic' }}">
                            {{-- Total Available Seat --}}
                        </span>
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
                <div class="tab-pane fade" id="studio-{{ $row->name }}" role="tabpanel" data-play="{{ $row->pid }}"
                    data-flag="" data-cost="{{ $row->class == 1 ? 75000 : 50000 }}" data-studio="{{ $row->name }}">

                        @php
                            $pid = $row->pid;
                        @endphp
                        
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
                                    @php
                                        $disable = 0;
                                        foreach ($asec as $book)
                                        {
                                            if ($pid == $book->id && $book->seat == ('A' . $i))
                                            {
                                                $disable = 1;
                                                break;
                                            }
                                            else
                                            {
                                                $disable = 0;
                                            }
                                        }
                                    @endphp
                                    <div class="col-6 pb-3">
                                        <input type="checkbox" class="seat {{ $class }}" value="A{{ $i }}" name="seat[]" data-play="" data-cost="" data-flag="" data-style="seat"
                                        data-on="Booked" data-off="A{{ $i }}" data-onstyle="success" data-offstyle="outline-success" data-toggle="toggle" data-size="sm"  value="A{{ $i }}" data-studio="" {{ $disable == 1 ? 'disabled' : '' }}>
                                    </div>
                                    @endfor
                                </div>
                            </div>

                            <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-xs-6">
                                <h4 class="d-lg-none d-md-none d-xl-none text-center pb-3 text-success">Center Row</h4>
                                <div class="row mx-md-auto">
                                    @for ($i = 0; $i < $center; $i++)
                                        @php
                                            $disable = 0;
                                            foreach ($bsec as $book)
                                            {
                                                if ($pid == $book->id && $book->seat == ('B' . $i))
                                                {
                                                    $disable = 1;
                                                    break;
                                                }
                                                else
                                                {
                                                    $disable = 0;
                                                }
                                            }
                                        @endphp
                                        <div class="col-2 pb-3">
                                            <input type="checkbox" class="seat {{ $class }}" data-row="B" data-seat="{{ $i }}" data-branch="{{ Session::get('location') }}" name="seat[]" {{ $disable == 1 ? 'disabled' : '' }} data-style="seat"
                                            data-on="Booked" data-off="B{{ $i }}" data-onstyle="success" data-offstyle="outline-success" data-toggle="toggle" data-size="sm" value="B{{ $i }}" data-play="" data-cost="" data-studio="">
                                        </div>
                                    @endfor
                                </div>
                            </div>

                            <div class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-xs-3">
                                <h4 class="d-lg-none d-md-none d-xl-none text-center pb-3 text-primary">Right Row</h4>
                                <div class="row ml-md-auto">
                                    @for ($i = 0; $i < $side; $i++)
                                        @php
                                            $disable = 0;
                                            foreach ($csec as $book)
                                            {
                                                if ($pid == $book->id && $book->seat == ('C' . $i))
                                                {
                                                    $disable = 1;
                                                    break;
                                                }
                                                else
                                                {
                                                    $disable = 0;
                                                }
                                            }
                                        @endphp
                                        <div class="col-6 pb-3">
                                            <input type="checkbox" class="seat {{ $class }}" data-on="Booked" value="C{{ $i }}" name="seat[]" data-cost="" data-offstyle="outline-success" data-style="seat"
                                            data-off="C{{ $i }}" data-onstyle="success" data-toggle="toggle" data-size="sm" data-play="" data-studio="" {{ $disable == 1 ? 'disabled' : '' }}>
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
                    <!-- Modal Payment -->
                    <div class="modal fade" id="payment" role="dialog" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Check Out</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="pay">Payment Method</label>
                                        </div>
                                        <select class="custom-select" id="pay" name="method">
                                            <option selected>Please select one</option>
                                            <option value="Gopay">Gopay</option>
                                            <option value="OVO">OVO</option>
                                            <option value="Debit Card">Debit Card</option>
                                            <option value="Credit Card">Credit Card</option>
                                        </select>
                                    </div>
                                    <div class="list-group">
                                    </div>
                                    <p id="confirmation"></p>                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button id="checkoutOke" type="submit" class="btn btn-primary">Check Out</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="total" value="">
    <input type="hidden" name="seats" value="">
    <input type="hidden" name="count" value="">
    {{-- <input type="hidden" name="playing" value="{{$seat[0]->id}}"> --}}

</form>
@endsection

@section('script')
<script>
    const seat = @json('seat');
    console.log(seat);
    let formatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
    });

    $(document).ready(function () {

        $('div.tab-pane.fade').each(function () {
            $(this).find('input[type="checkbox"].seat').attr('data-play', $(this).attr('data-play'));
            $(this).find('input[type="checkbox"].seat').attr('data-cost', $(this).attr('data-cost'));
            $(this).find('input[type="checkbox"].seat').attr('data-studio', $(this).attr('data-studio'));
        });
        // $('div.tab-pane.fade').find('input[type="checkbox"].seat').attr('data-play', $(this).attr('data-play'));
        $('span.total').text('Rp 0,00');
        $('#checkoutOke').prop('disabled', true);
        $('div.col>button').prop('disabled', true);
        $('input[type="checkbox"]').change(() => {
            let lux = $('input.seat.deluxe:checked').length * 75000; // Premiere Price
            let std = $('input.seat.classic:checked').length * 50000; // Standard Price
            let total = lux + std; // Total Price

            $('span.total').html(formatter.format(total))
            
            let checkSeat = $('input[type="checkbox"].seat:checked');
            let allSeat = [];
            let displaySeat = "";
            let studioName = "";
            // Loop Through Every Seat that checked and store in array
            $.each(checkSeat, function (index, value) {
                allSeat.push({
                    seat : $(value).val(),
                    play : $(this).attr('data-play'),
                    cost : $(this).attr('data-cost'),
                    studio : $(this).attr('data-studio'),
                })
                // Parse every seat into readable text
                $.each(allSeat, (index, value) => {
                    if (index == 0) {
                        studioName = value.studio
                        displaySeat = "Studio "+ studioName +" with seat number "+ value.seat
                    } else {
                        if(value.studio!=studioName){
                            studioName = value.studio;
                            displaySeat = displaySeat + " and Studio "+ studioName +" with seat number "+ value.seat
                        }else{
                            displaySeat = displaySeat +  ", " + value.seat
                        }
                    }
                    index++;
                });
            });

            let seats = JSON.stringify(allSeat);
            console.log(seats);

            // Disabled button when not checked

            // Disabled button when not checked

            // Disabled button when not checked
            if (checkSeat.length == 0) {
                $('div.col>button').prop('disabled', true);
                $('#confirmation').html(`You haven't selected a seat yet`);
            } else if ($('input[type="checkbox"].seat:checked').length == 1) {
                $('div.col>button').prop('disabled', false);
                $('#confirmation').html(`Are you sure you want to checkout with ${checkSeat.length} seat in ${displaySeat} for ${total}?`);
            } else {
                $('div.col>button').prop('disabled', false);
                $('#confirmation').html(`Are you sure you want to checkout with ${checkSeat.length} seats in ${displaySeat} for ${total}?`);
            }

            let count = $("input:checked").length;

            $('input[name=total]:hidden').val(total);
            $('input[name=seats]:hidden').val(seats);
            $('input[name=count]:hidden').val(count);

        });

        $('#pay').on('change', function () {
            if(this.value!="Please select one"){
                $('#checkoutOke').prop('disabled', false);
            }else{
                $('#checkoutOke').prop('disabled', true);
            }
        });

        let stdrem = 80 - $('input.seat.classic:disabled').length;
        let luxrem = 40 - $('input.seat.deluxe:disabled').length;
        $('span#remain.deluxe').html(luxrem);
        $('span#remain.classic').html(stdrem);

        $('input[type="checkbox"].seat:disabled').each(function () {
            $(this).attr('data-offstyle', 'danger');
        });
    });
</script>
@endsection

{{-- @section('footer') --}}