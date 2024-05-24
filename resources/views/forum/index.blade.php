@extends('layouts.master')
@section('title', 'MediConnect-forum')
@section('main')
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Forum</h1>
</div>
<!-- Forum Content -->
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Welcome to our Medical Forum</h2>
        <a href="{{ route('forum.create') }}" class="btn btn-primary text-white">Add New Post</a>
    </div>
    <p>Feel free to ask any medical-related questions or share your knowledge.</p>
    <!-- Forum Posts -->
    <div class="row">
        <div class="col-md-8">
            @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <img src="img/avatar.jpg" alt="Profile Picture" class="rounded-circle" width="50" height="50">
                        <span class="ms-3">{{ $post->user->name }}</span>
                    </div>
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ Str::limit($post->content, 150) }}</p>
                    <a href="{{ route('forum.show', $post->id) }}">Read More</a>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Sidebar -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Recent Posts</h5>
                    <ul class="list-group">
                        @foreach($posts->take(5) as $recentPost)
                        <li class="list-group-item">
                            <a href="{{ route('forum.show', $recentPost->id) }}">{{ $recentPost->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
