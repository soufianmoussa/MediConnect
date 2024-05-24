@extends('layouts.master')
@section('title', 'Post Details')
@section('main')
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Forum</h1>
</div>
<div class="container mt-5">
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex align-items-center mb-3">
                <img src="{{asset('img/avatar.jpg')}}" alt="Profile Picture" class="rounded-circle" width="50" height="50">
                <span class="ms-3">{{ $post->user->name }}</span>
            </div>
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Comments</h5>
            @foreach($post->comments as $comment)
            <div class="mb-3">
                <div class="d-flex align-items-center mb-2">
                    <img src="{{asset('img/avatar.jpg')}}" alt="Profile Picture" class="rounded-circle" width="40" height="40">
                    <span class="ms-2">{{ $comment->user->name }}</span>
                </div>
                <p class="mb-0">{{ $comment->content }}</p>
            </div>
            @endforeach
            <form action="{{ route('forum.comments.store', $post->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="content" class="form-label"><h5>Add a comment</h5></label>
                    <textarea name="content" id="content" rows="3" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary text-white">Post Comment</button>
            </form>
        </div>
    </div>
</div>
@endsection
