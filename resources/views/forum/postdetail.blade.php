@extends('layouts.master')
@section('title', 'Forum')
@section('main')
<div class="container mt-5">
    <!-- Post Content -->
    <div class="row">
        <!-- Main Content -->
        <div class="col-md-8">
            <!-- Post Title -->
            <h1 class="mb-4">title</h1>
            <!-- Post Content -->
            <p>content</p>
            
            <!-- Comments -->
            <div class="mt-4">
                <h3>Comments</h3>
               
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title">username</h5>
                        <p class="card-text">comment_content</p>
                    </div>
                </div>
               
            </div>
            
            <!-- Add Comment Form -->
            <div class="mt-4">
                <h3>Add Comment</h3>
                <form action="#" >
                    @csrf
                    <input type="hidden" name="post_id" value="#">
                    <div class="form-group">
                        <label for="content">Your Comment</label>
                        <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <!-- End Main Content -->

        <!-- Sidebar -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Recent Questions</h5>
                    <ul class="list-group">
                        <li class="list-group-item">questions #</li>
                        <li class="list-group-item">questions #</li>
                        <li class="list-group-item">questions #</li>
                        <li class="list-group-item">questions #</li>
                       
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->
    </div>
    <!-- End Post Content -->
</div>
@endsection