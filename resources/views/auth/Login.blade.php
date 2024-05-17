@extends('layouts.master')
@section('main')
<br><br><br>
<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="p-5 bg-light rounded">
            <div class="row g-4">
                <div class="col-12">
                    <div class="text-center mx-auto" style="max-width: 700px;">
                        <h1 class="text-primary">Login</h1>
                    </div>
                </div>
                <div class="col-lg-12">
                    <form method="POST" action="{{route('login.action')}}">
                        @csrf
                       @if ($errors->any())
                           <div class="alert alert-danger"> <strong>Error</strong>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </div>
                        </ul>
                        @endif
                        <input type="email" name="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Email">
                        <input type="password" name="password" class="w-100 form-control border-0 py-3 mb-4" placeholder="Password">
                        <span>you dont have an account yet ? <a href="{{route('register')}}">register</a></span><br>
                        <span>Register Your pharmacy ? <a href="{{route('register')}}">register</a></span>
                        <br><br>
                        <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit">Login</button>
                    </form>
                </div>
            </div>
           
        </div>
    </div>
</div>
@endsection