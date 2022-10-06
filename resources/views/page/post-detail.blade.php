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
                <div class="card card-border-radius card-shadow post-card">
                    <div class="row">
                        <div class="col-2">
                            <a href="{{ URL::previous() }}" class="pl-4 btn btn-sm backBtn"><img
                                    style="width: 24px; height: 24px;" src="/image/back-btn.png" alt="">Back</a>
                        </div>
                        <div class="col-10">
                        </div>
                    </div>
                </div>

                <div class="post mb-0   ">
                    <div class="card card-border-radius card-shadow post-card p-2">
                        <div class="card-body">
                            <div class="row pb-4 position-relative">
                                @if ($Post->userId != auth()->user()->userId)
                                    <a href="{{ route('visit-profile', $Post->userId) }}" class="stretched-link"></a>
                                @else
                                    <a href="{{ route('profile') }}" class="stretched-link"></a>
                                @endif
                                <div class="col-2">
                                    <img class="post-account-img rounded-circle"
                                        src="{{ asset('storage/profileImage/' . $Post->user->image) }}" alt="">
                                </div>
                                <div class="col-10 pl-4 pt-1">
                                    <p class=" post-name mt-4">{{ $Post->user->name }}</p>
                                </div>

                            </div>
                            <h5 class="card-title post-title mb-2">{{ $Post->title }}</h5>
                            <img class="post-image mb-3" src="{{ asset('storage/postimage/' . $Post->image) }}"
                                alt="" style="height: 15srem; width: 100%;  border-radius: 16px;">
                            <br>
                            <p class="card-text post-subtitle ">{{ $Post->description }}</p>
                        </div>
                        <div class="d-flex flex-row-reverse pr-3">
                            <button type="button" class="btn add-post addPost-button rounded-pill mb-3 ml-3"
                                data-toggle="modal" data-target="#exampleModalCenter">
                                Comment
                            </button>
                            <form action="{{ route('like-post', $Post->postId) }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <button class="like mt-1 pr-2" type="submit"
                                    style="border: none!important ; background-color: transparent; "><img class=""
                                        src="/image/like.png" alt="" style="width: 24px; height: 24px; ">
                                    {{ $Post->like }}</button>
                            </form>
                        </div>

                        <!-- modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content " style="border-radius: 18px;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Comment</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('store-post-comment', $id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <textarea name="post_comment" id="post_comment" class="form-control" id="exampleFormControlTextarea1"
                                                    rows="3" placeholder="Add new comment..." required></textarea>
                                            </div>
                                            <div class="d-flex flex-row-reverse">
                                                <button type="submit" class="btn add-post addPost-button rounded-pill ">
                                                    comment
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post mb-0">
                    <div class="card card-border-radius card-shadow post-card mb-0">
                        <div class="card-body py-2 mx-auto">
                            <H5 class="mx-auto post-title">Comments</H5>
                        </div>
                    </div>
                </div>
                <div class="space">
                    @foreach ($PostComment as $postComment)
                        <div class="post m-auto">
                            <div class="card card-shadow post-card mb-0 card-border-radius">
                                <div class="card-body">
                                    <div class="position-relative">
                                        <a href="{{ route('visit-profile', $postComment->userId) }}"
                                            class="stretched-link"></a>
                                        <div class="row pb-4">
                                            <div class="col-2">
                                                <img class="post-account-img rounded-circle"
                                                    src="{{ asset('storage/profileImage/' . $postComment->user->image) }}"
                                                    alt="">
                                            </div>
                                            <div class="col-10 pl-4 pt-1">
                                                <p class=" post-name mt-4">{{ $postComment->user->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <p>{{ $postComment->text }}</p>
                                    <br>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
