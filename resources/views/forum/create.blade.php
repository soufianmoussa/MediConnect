@extends('layouts.master')
@section('title', 'Create New Post')
@section('main')
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Forum</h1>
</div>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Create New Post</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('forum.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content" id="content" rows="5" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary text-white">Create Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
