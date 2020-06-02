@extends('layouts.app')

@section('title')
    {{ $movie->title }}
@endsection

{{-- @section('header') --}}

@section('content')
@include('includes.alert')
    <div class="mb-3">
        <!-- breadcumb -->
        <div class="row mt-4">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="#">{{ $movie->title }}</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Poster Kiri -->
        <div class="row mt-3">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="row">
                    <div class="col-12">
                        @if (Storage::disk('local')->has('poster/' . $movie->poster))
                            <img class="img-fluid img-thumbnail rounded mx-sm-auto d-block" src="{{ route('movie.poster', ['filename' => $movie->poster]) }}" alt="{{ $movie->title }}">
                        @endif
                    </div>
                    {{-- Desktop Casts Display --}}
                    <div class="col-12 d-sm-none d-lg-block d-md-block d-xl-block">
                        <h5 class="pl-3 mt-2">Casts</h5>
                        @if (isset($casts))
                            <ul class="list-group mb-2">
                                @foreach ($casts as $act)
                                    <li class="list-group-item list-group-item-action">{{ $act->name }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mt-sm-2 mt-md-0">
                <div class="card">
                    <div class="pl-3 pr-3">
                        <div class="row pt-2">
                            <div class="col"><h1 class="pb-3 text-sm-center text-md-left text-lg-left text-xl-left">{{ $movie->title }}</h1></div>
                        </div>

                        <div class="row pt-2">
                            <div class="col-lg-3 col-sm-4">
                                <h5>Rating</h5>
                            </div>
                            <div class="col-lg-9 col-sm-8">
                                <h5 class="">{{ number_format($rating, 2, '.', ',') }} <i class="fas fa-star text-warning"></i></h5>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="col-lg-3 col-sm-4">
                                <h5>Year</h5>
                            </div>
                            <div class="col-lg-9 col-sm-8">
                                <h5 class="">{{ DateTime::createFromFormat("Y-m-d", $movie->released)->format("Y") }}</h5>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="col-lg-3 col-sm-4">
                                <h5>Genre</h5>
                            </div>
                            <div class="col-lg-9 col-sm-8">
                                @if (isset($genres))
                                    <h5 class="">
                                        @foreach ($genres as $genre)
                                            {{ $genre->genre }}
                                        @endforeach
                                    </h5>
                                @endif
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="col-lg-3 col-sm-4">
                                <h5 class="">MPA Rating</h5>
                            </div>
                            <div class="col-lg-9 col-sm-8">
                                <h5 class="">
                                    @if ($movie->parental == 0)
                                        G
                                    @else
                                        @if ($movie->parental == 10)
                                            PG
                                        @else
                                            @if ($movie->parental == 13)
                                                PG-13
                                            @else
                                                @if ($movie->parental == 16)
                                                    R
                                                @else
                                                    NC-17
                                                @endif
                                            @endif
                                        @endif
                                    @endif
                                </h5>  
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="col-lg-3 col-sm-4">
                                <h5>Director</h5>
                            </div>
                            <div class="col-lg-9 col-sm-8">
                                <h5 class="">
                                    {{ $movie->director }}
                                </h5>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="col-lg-3 col-sm-4">
                                <h5>Duration</h5>
                            </div>
                            <div class="col-lg-9 col-sm-8">
                                <h5 class="">
                                    <i class="fad fa-stopwatch"></i> {{ floor($movie->duration / 60) }} {{ floor($movie->duration / 60) != 1 ? 'Hours' : 'Hour'}} {{ ($movie->duration % 60) }} {{ ($movie->duration % 60) != 1 ? 'Minutes' : 'Minute'}}
                                </h5>
                            </div>
                        </div>

                        <div class="row pt-2">
                            @if ($movie->avail == 1)
                                <div class="col-lg-3 col-sm-4">
                                    <h5 class="">
                                        Showtimes
                                    </h5>
                                </div>
                                <div class="col-lg-9 col-sm-8">
                                    <h5>
                                    @if (!empty($shows))
                                        @foreach ($shows->unique('time') as $data)
                                            <a class="btn btn-outline-dark mt-1" href="{{ route('movie.seat', ['branch' => Session::get('location'), 'id' => $movie->id, 'time' => $data->time]) }}">
                                                {{ date('G.i', strtotime($data->time)) }}
                                            </a>
                                        @endforeach
                                    @endif
                                    </h5>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    {{-- Mobile Casts Display --}}
                    <div class="d-lg-none d-xl-none d-md-none">
                        <div class="dropdown-divider"></div>
                        <div class="row">
                            <div class="col">
                                <h5 class="pl-3 mt-2">Casts</h5>
                                <div class="dropdown-divider"></div>
                                @if (isset($casts))
                                    <ul class="list-group list-group-flush">
                                        @foreach ($casts as $act)
                                            <li class="list-group-item list-group-item-action">{{ $act->name }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="dropdown-divider"></div>
                    <div class="row">
                        <div class="col">
                            <div class="pl-3 pr-3">
                                <h5 class="pt-2">Synopsis</h5>
                                <p class="text-justify">
                                    {{ $movie->synopsis }}
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="dropdown-divider"></div>
                    <div class="row">
                        <div class="col">
                        <h5 class="pt-2 pl-3">Trailer</h5>
                            <a href="#" class="js-trigger-video-modal w-auto h-auto d-block img-thumb" data-youtube-id="{{ str_replace('https://www.youtube.com/embed/', '', $movie->trailer) }}">
                                <img class="mt-3 img-fluid d-block mx-sm-auto" width="1000" src="{{ str_replace('https://www.youtube.com/embed/', 'https://img.youtube.com/vi/', $movie->trailer) }}/maxresdefault.jpg" alt="{{ $movie->title }}">
                            </a>
                        </div>
                    </div>

                </div>

                

            </div>

        </div>
        {{-- Review Bawah --}}
        <div class="row mt-3">
            <div class="col-lg-6">
                @if (isset($reviews))
                    <h5 class="pl-xl-3">Recent Reviews</h5>
                    <ul class="list-group">
                        @foreach ($reviews as $review)
                            <li href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $review->header }}</h5>
                                    <small>{{ $review->rating }} <i class="fas fa-star text-warning"></i></small>
                                </div>
                                <p class="mb-1">{{ $review->content }}</p>
                                <small>Reviewed by {{ $review->username }}</small>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <h5>No reviews about this movie yet</h5>
                @endif
            </div>

            @if (is_null($flag))
                @if (!empty($check))
                <div class="col-lg-6">
                    <form action="{{ route('user.review', ['user' => Auth::user()->id, 'movie' => $movie->id]) }}" method="post" accept-charset="utf-8">
                        @csrf
                        <h5 class="mt-sm-2 mt-lg-0">Any thoughts to share about this movie?</h5>

                        <label for="header">The Heading</label>
                        <input name="header" type="text" class="form-control" placeholder="The heading of this review" required>
                        
                        <label for="content">The Content</label>
                        <textarea name="content" class="form-control" placeholder="Thoughts to say" required></textarea>
                        
                        <div class="row mt-2">
                            <div class="col-8">
                                <h5 class="mt-1">Rate</h5>
                                <div class="star-rating mt-1">
                                    <fieldset>
                                        <input type="radio" id="star10" name="rating" value="10" required /><label for="star10">10 stars</label>
                                        <input type="radio" id="star9" name="rating" value="9" /><label for="star9">9 stars</label>
                                        <input type="radio" id="star8" name="rating" value="8" /><label for="star8">8 stars</label>
                                        <input type="radio" id="star7" name="rating" value="7" /><label for="star7">7 stars</label>
                                        <input type="radio" id="star6" name="rating" value="6" /><label for="star6">6 star</label>
                                        <input type="radio" id="star5" name="rating" value="5" /><label for="star5">5 stars</label>
                                        <input type="radio" id="star4" name="rating" value="4" /><label for="star4">4 stars</label>
                                        <input type="radio" id="star3" name="rating" value="3" /><label for="star3">3 stars</label>
                                        <input type="radio" id="star2" name="rating" value="2" /><label for="star2">2 stars</label>
                                        <input type="radio" id="star1" name="rating" value="1" checked /><label for="star1">1 star</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="mt-4 btn btn-info float-right">Share &nbsp; <i class="fad fa-pencil-alt"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                @endif
            @endif
        </div>
    </div>

    <section class="video-modal">

        <!-- Modal Content Wrapper -->
        <div id="video-modal-content" class="video-modal-content">
          
           <!-- iframe -->
           <iframe 
              id="youtube" 
              width="100%" 
              height="100%" 
              frameborder="0" 
              allow="autoplay" 
              allowfullscreen
              webkitallowfullscreen
              mozallowfullscreen
              src={{ $movie->trailer }}
            ></iframe>
    
            <a href="#" class="close-video-modal">
                <!-- X close video icon -->
                <svg 
                    version="1.1" 
                    xmlns="http://www.w3.org/2000/svg" 
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    x="0"
                    y="0"
                    viewBox="0 0 32 32" 
                    style="enable-background:new 0 0 32 32;" 
                    xml:space="preserve" 
                    width="24" 
                    height="24" 
                >
                    <g id="icon-x-close">
                        <path fill="#ffffff" d="M30.3448276,31.4576271 C29.9059965,31.4572473 29.4852797,31.2855701 29.1751724,30.980339 L0.485517241,2.77694915 C-0.122171278,2.13584324 -0.104240278,1.13679247 0.52607603,0.517159487 C1.15639234,-0.102473494 2.17266813,-0.120100579 2.82482759,0.477288136 L31.5144828,28.680678 C31.9872448,29.1460053 32.1285698,29.8453523 31.8726333,30.4529866 C31.6166968,31.0606209 31.0138299,31.4570487 30.3448276,31.4576271 Z" id="Shape"></path>
                        <path fill="#ffffff" d="M1.65517241,31.4576271 C0.986170142,31.4570487 0.383303157,31.0606209 0.127366673,30.4529866 C-0.12856981,29.8453523 0.0127551942,29.1460053 0.485517241,28.680678 L29.1751724,0.477288136 C29.8273319,-0.120100579 30.8436077,-0.102473494 31.473924,0.517159487 C32.1042403,1.13679247 32.1221713,2.13584324 31.5144828,2.77694915 L2.82482759,30.980339 C2.51472031,31.2855701 2.09400353,31.4572473 1.65517241,31.4576271 Z" id="Shape"></path>
                    </g>
              </svg>
            </a>
    
        </div> <!-- end modal content wrapper -->
    
        <!-- clickable overlay element -->
        <div class="overlay"></div>
    
    </section>
    
@endsection

{{-- @section('footer') --}}

@section('script')
    <script>
        $(document).ready(() => {
            // Toggle Video Modal
            toggle_video_modal = () => {
                // Click on video thumbnail or link
                $(".js-trigger-video-modal").on("click", function (e) {
                    // prevent default behavior for a-tags, button tags, etc. 
                    e.preventDefault();
                    // Grab the video ID from the element clicked
                    let id = $(this).data('youtube-id');
                    // Autoplay when the modal appears
                    // Note: this is intetnionally disabled on most mobile devices
                    // If critical on mobile, then some alternate method is needed
                    let autoplay = '?autoplay=1';
                    // Don't show the 'Related Videos' view when the video ends
                    let related_no = '&rel=0';
                    // String the ID and param variables together
                    let src = '//www.youtube.com/embed/' + id + autoplay + related_no;
                    // Pass the YouTube video ID into the iframe template...
                    // Set the source on the iframe to match the video ID
                    $("#youtube").attr('src', src);
                    // Add class to the body to visually reveal the modal
                    $("body").addClass("show-video-modal noscroll");
                });

                // Close and Reset the Video Modal
                close_video_modal = () => {
                    event.preventDefault();
                    // re-hide the video modal
                    $("body").removeClass("show-video-modal noscroll");
                    // reset the source attribute for the iframe template, kills the video
                    $("#youtube").attr('src', '');
                }

                // if the 'close' button/element, or the overlay are clicked 
                $('body').on('click', '.close-video-modal, .video-modal .overlay', event => {
                    // call the close and reset function
                    close_video_modal();
                });

                // if the ESC key is tapped
                $('body').keyup((e) => {
                    // ESC key maps to keycode `27`
                    if (e.keyCode == 27)
                    {
                        // call the close and reset function
                        close_video_modal();
                    }
                });
            }
            toggle_video_modal();
        });
    </script>
@endsection