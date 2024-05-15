@extends('layouts.admin')
@section('title','Profile')
@section('main')
<form method="POST" enctype="multipart/form-data" action="{{route('profile.update')}}">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" value="{{ auth()->user()->name }}" class="form-control" />
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input id="email" name="email" type="text" value="{{ auth()->user()->email }}" class="form-control" />
    </div>
   
    <div class="form-group">
        <label for="password">New Password</label>
        <input id="password" name="password" type="password" class="form-control" />
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirm New Password</label>
        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" />
    </div>
    <div class="form-group mt-4">
        <button type="submit" class="btn btn-primary btn-block">Save Profile</button>
    </div>
</form>

@endsection
    
