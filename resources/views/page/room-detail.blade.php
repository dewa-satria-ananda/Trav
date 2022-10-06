@extends('layouts.app')
@if (Session::get('msg'))
    <div class="alert bg-success alert-icon-left mb-2 text-white text-center">
        {{ Session::get('msg') }}
    </div>
@endif
<link href="{{ asset('css/home.css') }}" rel="stylesheet">

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
                <div class="card card-border-radius card-shadow post-card">
                    <div class="row">
                        <div class="col-2">
                            <a href="{{ route('trav-together') }}" class="pl-4 btn btn-sm backBtn"><img
                                    style="width: 24px; height: 24px;" src="/image/back-btn.png" alt="">Back</a>
                        </div>
                        <div class="col-10">
                        </div>
                    </div>
                </div>
                <div class="post m-auto">
                    <div class="card card-border-radius card-shadow post-cardp-2">
                        <div class="card-body pb-4">
                            <div class="row pb-4">
                                <div class="col-2">
                                    <img class="post-account-img rounded-circle"
                                        src="{{ asset('storage/profileImage/' . $TravTogether->user->image) }}"
                                        alt="">
                                </div>
                                <div class="col-8 pl-4 pt-1">
                                    <p class=" post-name mt-4">
                                        {{ $TravTogether->user->name }}
                                    </p>
                                </div>
                                <div class="col-2 mx-auto">
                                    <p class="border border-dark p-1 rounded post-name mt-4 text-center"
                                        style="background-color: #D9E1E8;">
                                        {{ $TravTogether->joinedPeople }}/{{ $TravTogether->people }}
                                    </p>
                                </div>
                            </div>
                            <p class="travel-together-title">{{ $TravTogether->title }}</p>
                            <p class="travel-together-title mb-0">Budget : Rp. {{ $TravTogether->budget }}</p>
                            <p class="travel-together-title pb-3 text-left" style="white-space: pre-line!important;">
                                {{ $TravTogether->description }}
                            </p>
                            @if (auth()->user()->userId == $TravTogether->userId)
                            @else
                                @if ($temp == '1')
                                    <div class="d-flex flex-row-reverse">
                                        <form action="{{ route('leave-room', $TravTogether->travTogetherId) }}"
                                            method="POST">
                                            @method('delete')
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn cancelBtn rounded-pill">Leave Room</button>
                                        </form>
                                        <button type="button" class="mr-3 btn add-post addPost-button rounded-pill"
                                            style="height: 32px;">
                                            <a href="https://wa.me/{{ $TravTogether->phone }}" target="_blank"
                                                style="text-decoration: none;">Message</a>
                                        </button>
                                    </div>
                                @else
                                    @if ($count == '1')
                                        <div class="d-flex flex-row-reverse">
                                            <p>Room is full </p>
                                        </div>
                                    @else
                                        <div class="d-flex flex-row-reverse">
                                            <button type="button" class="btn add-post addPost-button rounded-pill px-3"
                                                data-toggle="modal" data-target="#exampleModalCenter">
                                                Join Room
                                            </button>
                                        </div>
                                    @endif
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content " style="border-radius: 18px;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Join Room</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-align-center">Are you sure?</h5>
                            <div class="row">
                                <!-- <button type="submit" class="btn add-post addPost-button rounded-pill ">
                                            Cancel
                                        </button> -->
                                <form action="{{ route('join-room', $TravTogether->travTogetherId) }}" method="POST"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn add-post addPost-button rounded-pill ml-3 ">
                                        Join
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
