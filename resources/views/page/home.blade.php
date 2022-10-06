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
            <div class="col-6 mid border-left border-right pt-4 px-0 ">
                <div class="card-manual">
                    <div class="row justify-content-between">
                        <div class="col-8">
                            <p class="pl-4 latest-post mt-1">Latest Post</p>
                        </div>
                        <div class="col-4 top-mid-btn">
                            <div class="d-flex flex-row-reverse ">
                                <button type="button" class="btn addPost-button add-post  rounded-pill mr-4"
                                    data-toggle="modal" data-target="#exampleModalCenter">
                                    Add post
                                </button>
                                <!-- modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content " style="border-radius: 18px;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">New Post</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('store-post') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <p class="mb-0 form-font"><span style="color:#ff0000">*</span>
                                                            Title</p>
                                                        <input name="post_title" class="form-control" type="text"
                                                            placeholder="Post Title" id="post_title" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <p class="mb-0 form-font"><span style="color:#ff0000">*</span>
                                                            Image</p>
                                                        <input name="post_image" type="file" class="form-control-file"
                                                            id="post_image" placeholder="Image" id="post_image" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <p class="mb-0 form-font"> Description</p>
                                                        <textarea name="post_description" class="form-control" id="exampleFormControlTextarea1" rows="5"
                                                            placeholder="Description" id="post_description" required></textarea>
                                                    </div>
                                                    <div class="d-flex flex-row-reverse">
                                                        <button type="submit"
                                                            class="btn add-post addPost-button rounded-pill ">
                                                            Post
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
                </div>
                <div class="space">
                    @if ($Post)
                        @foreach ($Post as $post)
                            <div class="post m-0">
                                <div class="card card-border-radius card-shadow post-card p-2 mb-0 ">
                                    <div class="card-body">
                                        <div class="position-relative">
                                            @if ($post->userId != auth()->user()->userId)
                                                <a href="{{ route('visit-profile', $post->userId) }}"
                                                    class="stretched-link"></a>
                                            @else
                                                <a href="{{ route('profile') }}" class="stretched-link"></a>
                                            @endif
                                            <div class="row pb-4">
                                                <div class="col-2">
                                                    <img class="post-account-img rounded-circle"
                                                        src="{{ asset('storage/profileImage/' . $post->user->image) }}"
                                                        alt="">
                                                </div>
                                                <div class="col-10 pl-4 pt-1">
                                                    <p class=" post-name mt-4">{{ $post->user->name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="position-relative"> <a
                                                href="{{ route('detail-post', $post->postId) }}"
                                                class="stretched-link"></a>
                                            <h5 class="card-title post-title mb-2">{{ $post->title }}</h5>
                                            <img class="post-image mb-2"
                                                src="{{ asset('storage/postimage/' . $post->image) }}" alt=""
                                                style="height: 14rem; width: 100%;  border-radius: 16px;">
                                            <br>
                                            <p class="card-text post-subtitle mb-3">{{ $post->description }}</p>
                                        </div>
                                        <div class="row">
                                            <form action="{{ route('like-post', $post->postId) }}" method="POST"
                                                enctype="multipart/form-data" class="pl-1">
                                                {{ csrf_field() }}
                                                <button class="like" type="submit"
                                                    style="border: none!important ; background-color: transparent; padding: 0 !important; ">
                                                    <img class="" src="/image/like.png" alt=""
                                                        style="width: 24px; height: 24px; "> {{ $post->like }}
                                                </button>
                                            </form>
                                            <div class="pl-3 like">
                                                <a href="{{ route('detail-post', $post->postId) }}"
                                                    style="text-decoration: none; color: black;">
                                                    <img class="" src="/image/comment.png" alt=""
                                                        style="width: 24px; height: 28px; ">
                                                    {{ $post->comment_count }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="post m-0">
                            <div class="card card-border-radius card-shadow post-card p-2 mb-0 ">
                                <div class="card-body">
                                    <h5 class="card-title post-title mb-2 ">No one you followed has made a post yet
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endif
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
