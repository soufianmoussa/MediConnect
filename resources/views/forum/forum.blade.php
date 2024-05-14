@extends('layouts.master')
@section('title','MediConnect-forum')
@section('main')
 <!-- Single Page Header start -->
 <div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Forum</h1>
</div>
    <!-- Forum Content -->
<div class="container mt-5">
    <h2>Welcome to our Medical Forum</h2>
    <p>Feel free to ask any medical-related questions or share your knowledge.</p>
    <!-- Forum Posts -->
    <div class="row">
        <div class="col-md-8">
            <!-- Forum Post 1 -->
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">How to deal with anxiety?</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
                    <a href="#" >Read More</a>
                </div>
            </div>
            <!-- Forum Post 2 -->
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Tips for a healthy diet</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
                    <a href="#" >Read More</a>
                </div>
            </div>
            <!-- Add New Post Button -->
            <a href="{{route('addpost')}}" >Add New Post</a>
        </div>
        <!-- Sidebar -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Recent Posts</h5>
                    <ul class="list-group">
                        <li class="list-group-item">How to deal with anxiety?</li>
                        <li class="list-group-item">Tips for a healthy diet</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection