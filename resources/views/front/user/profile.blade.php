@extends('layouts.app')

@section('title')
{{ $user->username }}'s Profile
@endsection

@section('header')
@section('content')
@include('includes.alert')
<form action="{{ route('profile.update') }}" accept-charset="utf-8" enctype="multipart/form-data" method="post">
    @csrf
    <div class="emp-profile">
        <div class="card" style="box-shadow:0 4px 5px 0 rgba(0,0,0,0.14), 0 1px 10px 0 rgba(0,0,0,0.12), 0 2px 4px -1px rgba(0,0,0,0.3); background-color: rgba(216, 227, 245, 0.555);">
            <div class="row pt-5 pb-5">
                <div class="col-md-4 text-center">
                    <div class="panel" style="padding: 15px 25px 25px;">
                        <div class="profile-img">
                            <img class="img-fluid img-thumbnail img-thumbnail" src="{{ route('user.profile', ['filename' => $user->photo ]) }}" alt="{{ $user->photo }}" id="filepreview" />
                            <div class="file btn btn-lg btn-primary d-none toggleable">
                                Change Photo
                                <input id="fileupload" type="file" name="photo"/>
                            </div>
                        </div>
                            <h2>{{ $user->firstname . " " . $user->lastname }}</h2>
                        <br><br>
                        <p>
                            @if(isset($user->bio))
                                {{ $user->bio }}
                            @else
                                No bio yet.
                            @endif
                        </p>
                        <div class="pt-3">
                            <table class="table table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <td>
                                            Average Rating
                                        </td>
                                        <td>
                                            @if(isset($rating))
                                                {{ $total }} <i class="fad fa-star text-warning"></i>
                                            @else 
                                                0.0
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Member since
                                        </td>
                                        <td>
                                            {{ substr($user->created, 0, 11) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            {{ $user->username }}
                        </h5>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#profile" style="background-color:inherit" role="tab"
                                    aria-controls="home" aria-selected="true">Profile</a> {{-- About --}}
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" style="background-color:inherit" role="tab"
                                    aria-controls="history" aria-selected="false">History</a> {{-- Timeline --}}
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="review-tab" data-toggle="tab" href="#reviews" style="background-color:inherit" role="tab"
                                    aria-controls="reviews" aria-selected="false">Reviews</a> {{-- Reviews --}}
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="home-tab">
                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <label>User Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->id }}</p>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-6 toggleable d-none">
                                    <label>Firstname</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="firstname" id="firstname" class="form-control toggleable d-none" value="{{ $user->firstname }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 toggleable d-none">
                                    <label>Lastname</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="lastname" id="lastname" class="form-control toggleable d-none" value="{{ $user->lastname }}">
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <label>Username</label>
                                </div>
                                <div class="col-md-6">
                                    <p class="toggleable">{{ $user->username }}</p>
                                    <input type="text" name="username" id="username" class="form-control toggleable d-none" value="{{ $user->username }}">
                                </div>
                            </div> --}}
                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p class="toggleable">{{ $user->email }}</p>
                                    <input type="email" name="email" id="email" class="form-control toggleable d-none" value="{{ $user->email }}">
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Birth Date</label>
                                </div>
                                <div class="col-md-6">
                                    <p class="toggleable">{{ $user->birthdate }}</p>
                                    <div class="input-group toggleable d-none" data-target-input="nearest">
                                        <input type="text" name="birthdate" id="birthdate" class="form-control datepicker datetimepicker-input" value="{{ $user->birthdate }}" data-provide="datepicker" readonly="readonly">
                                        <div class="input-group-append" data-target="#birthdate" data-toggle="datetimepicker">
                                            <button type="button" class="btn btn-outline-secondary" id="dateicon"><i class="fad fa-calendar-alt"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Gender</label>
                                </div>
                                <div class="col-md-6">
                                    <p class="toggleable">{{ $user->gender }}</p>
                                    <select name="gender" id="gender" class="form-control toggleable d-none">
                                        <option value="{{ $user->gender }}" selected>{{ $user->gender }}</option>
                                        @if ($user->gender == "Male")
                                            <option value="Female">Female</option>
                                        @else
                                            <option value="Male">Male</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p class="toggleable">{{ $user->phone }}</p>
                                    <input type="text" name="phone" id="phone" class="form-control toggleable d-none" value="{{ $user->phone }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 toggleable d-none">
                                    <label>Bio</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea name="bio" id="bio" class="form-control toggleable d-none">{{ $user->bio }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="content table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Total Price</th>
                                            <th>Payment Method</th>
                                            <th>Order Time</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 0;
                                        @endphp
                                        @foreach($history as $history => $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->total}}</td>
                                            <td>{{$value->method}}</td>
                                            <td>{{$value->time}}</td>
                                            <td>
                                                @if(isset($status[0]))
                                                    <span for="" class="label label-success">Confirmed</span>
                                                @else
                                                    <span for="" class="label label-warning">Pending</span>
                                                @endif
                                            </td>
                                            @php
                                                $counter++;
                                            @endphp
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{-- link_to_route('profile.update', '', $user->id, ['class' => 'btn btn-info btn-sm fad fa-edit']) --}}
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="list-group">
                            @foreach ($rating as $data)
                                <a class="list-group-item list-group-item-action" href="{{ route('movie.details', ['branch' => Session::get('location'), 'id' => $data->mid]) }}">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ $data->header }}</h5>
                                        <small>{{ $data->rating }} / 10 <i class="fad fa-star text-warning"></i></small>
                                    </div>
                                    <p class="mb-1 text-secondary">{{ $data->content }}</p>
                                    <small class="text-muted">{{ $data->title }}</small>
                                </a>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mt-auto">
                    {{--<a href="{{ url('profile/edit', ['id' => $user->id]) }}" class="btn btn-info btn-sm fad fa-edit"></a>--}}
                    <button type="button" class="toggle-edit toggleable btn btn-info btn-sm"><i class="fad fa-edit"></i></button>
                    <button type="button" class="toggle-edit toggleable btn btn-danger btn-sm d-none"><i class="fad fa-times"></i></button>
                    <button type="submit" class="toggle-edit toggleable btn btn-info btn-sm d-none"><i class="fad fa-edit"></i></button>
                    {{-- <input type="hidden" value="{{ Session::token() }}" name="_token"> --}}
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('footer')

@section('script')
<script>
    $(document).ready(() => {
        $('button.toggle-edit').click(() => {
            $('.toggleable').toggleClass('d-none');
        });

        $('.datepicker').datetimepicker({
            format: 'yyyy-MM-DD',
            allowInputToggle: true,
            ignoreReadonly: true,
        });

        // readURL = input => {
        //     if (input.files && input.files[0])
        //     {
        //         let reader = new FileReader();
        //         reader.onload = e => {
        //             $('#filepreview').attr('src', e.target.result);
        //         }
        //         reader.readAsDataURL(input.files[0]);
        //     }
        // }

        // $('#fileupload').change(() => {
        //     readURL(this);
        // });
    });
</script>
@endsection