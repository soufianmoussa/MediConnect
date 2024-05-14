@extends('layouts.admin')
@section('title','Profile')
@section('main')
<form method="POST" enctype="multipart/form-data" action="">
    <div class="form-group">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" value="{{ auth()->user()->name }}" class="form-control" />
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input id="email" name="email" type="text" value="{{ auth()->user()->email }}" class="form-control" />
    </div>
    <div class="form-group mt-4">
        <button type="submit" class="btn btn-primary btn-block">Save Profile</button>
    </div>
</form>

@endsection
    
