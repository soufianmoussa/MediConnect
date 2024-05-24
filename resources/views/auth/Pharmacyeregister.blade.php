@extends('layouts.master')
@section('main')
    
<br><br><br>
<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="p-5 bg-light rounded">
<div class="row g-4 mt-5">
    <div class="col-12">
        <div class="text-center mx-auto" style="max-width: 700px;">
            <h1 class="text-primary">Pharmacy Register</h1>
        </div>
    </div>
    <div class="col-lg-12">
        <form method="POST" action="{{route('registerpharmacy.submit')}}">
            @csrf
            <input type="text" name="name" class="w-100 form-control border-0 py-3 mb-4" placeholder="Your Name">
            @error('name')
                <span class="text-red-600">{{$message}}</span>
            @enderror
            <input type="email" name="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Email">
            @error('email')
            <span class="text-red-600">{{$message}}</span>
        @enderror
            <input type="password" name="password" class="w-100 form-control border-0 py-3 mb-4" placeholder="Password">
            @error('password')
            <span class="text-red-600">{{$message}}</span>
        @enderror
            <input type="password" name="password_confirmation" class="w-100 form-control border-0 py-3 mb-4" placeholder="Confirm Password">
            @error('password_confirmation')
            <span>{{$message}}</span>
        @enderror

        <input type="text" name="pharmacy_name" class="w-100 form-control border-0 py-3 mb-4" placeholder="Pharmacy name">
            @error('name')
                <span class="text-red-600">{{$message}}</span>
            @enderror
            <input type="text" name="addresse" class="w-100 form-control border-0 py-3 mb-4" placeholder="Addresse">
            @error('addresse')
            <span class="text-red-600">{{$message}}</span>
        @enderror
        <input type="text" name="localisation" class="w-100 form-control border-0 py-3 mb-4" placeholder="Location">
            @error('localisation')
            <span class="text-red-600">{{$message}}</span>
        @enderror
        <input type="text" name="Telephone" class="w-100 form-control border-0 py-3 mb-4" placeholder="(+212)512345678">
        @error('Telephone')
        <span class="text-red-600">{{$message}}</span>
    @enderror
        
            <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit">submit</button>
        </form>
    </div>
</div>
        </div>
    </div>
</div>

@endsection