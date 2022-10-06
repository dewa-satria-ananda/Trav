@extends('layouts.app')
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
                <div class="row card-manual">
                    <div class="col-12">
                        <p class="pl-4 latest-post mt-1">Edit Profile</p>
                    </div>
                </div>
                <div class="post m-auto">
                    <div class="card card-border-radius post-card p-2">
                        <div class="card-body">
                            <form action="{{ route('put-profile') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group row pb-4 mr-0 ml-0">
                                    <div class="col-2">
                                        <img class="post-account-img rounded-circle"
                                            src="{{ asset('storage/profileImage/' . auth()->user()->image) }}"
                                            alt="">
                                    </div>
                                    <div class="col-10 pl-4 pt-3 pr-0">
                                        <p class="edit-profile-text mb-1">Username</p>
                                        <input name="username" type="username" class="form-control" id="username"
                                            aria-describedby="usernameHelp" value="{{ auth()->user()->name }}">
                                    </div>
                                </div>
                                <p class="edit-profile-text mb-1">Profile Picture</p>
                                <div class="form-group custom-file">
                                    <input name="profile_image" type="file" class="custom-file-input"
                                        id="validatedCustomFile" value="{{ auth()->user()->image }}">
                                    <label class="custom-file-label" for="validatedCustomFile"></label>
                                    <div class="invalid-feedback">invalid type</div>
                                </div>

                                <div class="form-group pt-2">
                                    <label for="exampleFormControlTextarea1" class="edit-profile-text mb-0">Bio</label>
                                    <textarea name="bio" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ auth()->user()->bio }}</textarea>
                                </div>
                                <div class="d-flex flex-row-reverse">
                                    <button class="btn saveBtn rounded-pill mr-4" role="button"
                                        type="submit">Save</button>
                                    <a class="btn cancelBtn rounded-pill mr-4" href="/profile" role="button">Cancel</a>
                                </div>

                            </form>
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
