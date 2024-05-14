@extends('layouts.master')
@section('title','forum')
@section('main')
      <!-- Single Page Header start -->
  <div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">forum</h1>
</div>
<!-- Single Page Header End -->

<div class="container mt-5">

    <!-- New Post Form and Sidebar -->
    <div class="row">
        <!-- New Post Form -->
        <div class="col-lg-8">
            <form action="{{route('posts.store')}}" method="POST">
                @csrf
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="border-bottom rounded">
                            <input type="text" class="form-control border-0 me-4" placeholder="Title" id="title" name="title">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="border-bottom rounded my-4">
                            <textarea name="content" id="content" class="form-control border-0" cols="30" rows="8"  placeholder="content" ></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-between py-3 mb-5">
                           <button type="submit" class="btn border border-secondary text-primary rounded-pill px-4 py-3">Post</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- End New Post Form -->
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
           
                    <h5 >Recent Posts</h5>
                    <ul class="list-group">
                       @foreach ($lastposts as $post)
                        <li class="list-group-item">{{$post->title}}</li>
                       @endforeach
                    </ul>
              
        </div>
        <!-- End Sidebar -->
    </div>
    <!-- End New Post Form and Sidebar -->

</div>


@endsection