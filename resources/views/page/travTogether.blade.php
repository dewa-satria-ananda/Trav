@extends('layouts.app')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">

@if (Session::get('msg'))
    <div class="alert bg-success alert-icon-left mb-2 text-white text-center">
        {{ Session::get('msg') }}
    </div>
@endif

@section('content')
    <div class="container">
        <div class="row">
            <!-- left -->
            <div class="col-3 pl-0 left">
                <div class="card card-border-radius">
                    <div class="card-body pr-0">
                        <div>
                            <div class="home hvr-float pb-4">
                                <div class="row">
                                    <div class="col-2">
                                        <img style="width: fit-content; height: fit-content;" src="/image/home.png"
                                            alt="">
                                    </div>
                                    <div class="col-10">
                                        <a href="/" class="nav" style="padding-left: 15px;">Home</a>

                                    </div>
                                </div>
                            </div>
                            <div class="discussion hvr-float pb-4">
                                <div class="row">
                                    <div class="col-2">
                                        <img style="width: fit-content; height: fit-content;" src="/image/discussions.png"
                                            alt="">
                                    </div>
                                    <div class="col-10">
                                        <a href="/discussion" class="nav pl-2">Discussion</a>

                                    </div>
                                </div>
                            </div>
                            <div class="travelTogether hvr-float pb-4">
                                <div class="row">
                                    <div class="col-2">
                                        <img style="width: fit-content; height: fit-content;" src="/image/travTogether.png"
                                            alt="">
                                    </div>
                                    <div class="col-10">
                                        <a href="/travel-together" class="nav" style="padding-left: 1px;">Travel
                                            Together</a>

                                    </div>
                                </div>
                            </div>
                            <div class="explore hvr-float pb-4 mr-3">
                                <div class="row">
                                    <div class="col-2">
                                        <img style="width: fit-content; height: fit-content;" src="/image/explore.png"
                                            alt="">
                                    </div>
                                    <div class="col-10">
                                        <a href="/explore" class="nav" style="padding-left: 14px;">Explore</a>

                                    </div>
                                </div>
                            </div>
                            <div class="chat hvr-float pb-4">
                                <div class="row">
                                    <div class="col-2">
                                        <img style="width: fit-content; height: fit-content;" src="/image/chat.png"
                                            alt="">
                                    </div>
                                    <div class="col-10 " style="padding-left: 10px">
                                        <a href="/chat" class="nav" style="padding-left: 14px;">Chat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- mid -->
            <div class="col-6 mid border-right border-left pt-4 px-0">
                <div class="card-manual">
                    <div class="row justify-content-between">
                        <div class="col-8">
                            <p class="pl-4 latest-post mt-1">Travel Together</p>
                        </div>
                        <div class="col-4 text-center top-mid-btn pr-0 pl-5">
                            <div class="">
                                <button type="button" class="btn add-post addPost-button rounded-pill mr-4"
                                    data-toggle="modal" data-target="#exampleModalCenter">
                                    New Room
                                </button>
                            </div>
                            <!-- modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content" style="border-radius: 18px;">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">New Room</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('store-trav-together') }}" method="POST"
                                                enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <p class="mb-0 form-font"><span style="color:#ff0000">*</span> Title</p>
                                                    <input name="TravTogether_title" id="TravTogether_title"
                                                        class="form-control" type="text" placeholder="title" required>
                                                </div>
                                                <div class="form-group">
                                                    <p class="mb-0 form-font"><span style="color:#ff0000">*</span>
                                                        Destination</p>
                                                    <input name="TravTogether_destination" id="TravTogether_destination"
                                                        class="form-control" type="text" placeholder="destination"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <p class="mb-0 form-font"><span style="color:#ff0000">*</span> Budget
                                                    </p>
                                                    <input name="TravTogether_budget" id="TravTogether_budget"
                                                        class="form-control" type="text" placeholder="Budget"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <p class="mb-0 form-font"><span style="color:#ff0000">*</span> Phone
                                                        Number</p>
                                                    <input name="TravTogether_phone" id="TravTogether_phone"
                                                        class="form-control" type="text" placeholder="phone Number"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <p class="mb-0 form-font"><span style="color:#ff0000">*</span>
                                                        Description</p>
                                                    <textarea name="TravTogether_description" id="TravTogether_description" class="form-control"
                                                        id="exampleFormControlTextarea1" rows="5" placeholder="plan description" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <p class="mb-0 form-font"><span style="color:#ff0000">*</span> People
                                                    </p>
                                                    <input name="TravTogether_people" id="TravTogether_people"
                                                        class="form-control" type="text" placeholder="max. people"
                                                        required>
                                                </div>
                                                <div class="d-flex flex-row-reverse">
                                                    <button type="submit"
                                                        class="btn add-post addPost-button rounded-pill ">
                                                        Create
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($TravTogether)
                    @foreach ($TravTogether as $travTogether)
                        <div class="post m-auto">
                            <div class="card card-border-radius post-card p-2">
                                <div class="card-body pb-0">
                                    <div class="position-relative">
                                        @if ($travTogether->userId != auth()->user()->userId)
                                            <a href="{{ route('visit-profile', $travTogether->userId) }}"
                                                class="stretched-link"></a>
                                        @else
                                            <a href="{{ route('profile') }}" class="stretched-link"></a>
                                        @endif
                                        <div class="row pb-4">
                                            <div class="col-2">
                                                <img class="post-account-img rounded-circle"
                                                    src="{{ asset('storage/profileImage/' . $travTogether->user->image) }}"
                                                    alt="">
                                            </div>
                                            <div class="col-8 pl-4 pt-1">
                                                <p class=" post-name mt-4">
                                                    {{ $travTogether->user->name }}
                                                </p>
                                            </div>
                                            <div class="col-2 mx-auto">
                                                <p class="border border-dark p-1 rounded post-name mt-4 text-center"
                                                    style="background-color: #D9E1E8;">
                                                    {{ $travTogether->joinedPeople }}/{{ $travTogether->people }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="travel-together-title">{{ $travTogether->title }}</p>
                                    <p class="travel-together-title pb-3">Budget : Rp. {{ $travTogether->budget }}</p>

                                    <hr class="mb-0 pb-2 ">
                                    @if (auth()->user()->userId == $travTogether->userId)
                                        <div class="row text-center">
                                            <div class="col-6">
                                                <p class="discussion-view text-center">
                                                    <a href="{{ route('detail-room', $travTogether->travTogetherId) }}">
                                                        view room...
                                                    </a>
                                                </p>
                                            </div>
                                            <div class="col-6">
                                                <form action="{{ route('delete-room', $travTogether->travTogetherId) }}"
                                                    method="POST">
                                                    @method('delete')
                                                    {{ csrf_field() }}
                                                    <button type="submit"
                                                        class="room-delete-btn discussion-view">delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    @else
                                        <p class="discussion-view text-center m-0">
                                            <a href="{{ route('detail-room', $travTogether->travTogetherId) }}">
                                                view room...
                                            </a>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="post m-0">
                        <div class="card card-border-radius card-shadow post-card p-2 mb-0 ">
                            <div class="card-body">
                                <h5 class="card-title post-title mb-2 ">No one has made a room yet</h5>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- right -->
            <div class="col-3 right text-center">
                <div class="card card-border-radius">
                    <div class="card-body">
                        <img class="post-account-img rounded-circle"
                            src="{{ asset('storage/profileImage/' . auth()->user()->image) }}" alt="">
                        <p class="account-title mt-3">{{ auth()->user()->name }}</p>
                        <div class="row">
                            <div class="col-6">
                                <p class="account-subtitle mb-0">{{ auth()->user()->followers }}</p>
                                <p class="account-subtitle">followers</p>
                            </div>
                            <div class="col-6">
                                <p class="account-subtitle mb-0">{{ auth()->user()->following }}</p>
                                <p class="account-subtitle">following</p>
                            </div>
                        </div>

                        <div class="align-middle">
                            <div class="row">
                                <div class="col-12 right-navbar-profile">
                                    <img src="/image/profile.png" alt="" style="width: 24px; height: 24px;">
                                    <p class="account-subtitle mt-0 pl-2">
                                        <a href="{{ route('profile') }}">
                                            Profile
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 right-navbar-logout">
                                    <img src="/image/sign-out.png" alt="" style="width: 24px; height: 24px;">
                                    <p class="account-subtitle mt-0 pl-2">
                                        <a class="" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                    </p>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
