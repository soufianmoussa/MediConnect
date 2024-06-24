@extends('layouts.master')
@section('title','MediConnect')

@section('main')
<br> <br> <br> <br> <br> <br>
<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center" style="background-color: #81c408; color: white;">
            <h1>Profil de {{ $user->name }}</h1>
        </div>
        <div class="card-body">
            <form action="#" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nom:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                </div>
               
            <hr>
           
                <div class="form-group">
                    <label for="current_password">Mot de passe actuel:</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                </div>
                <div class="form-group">
                    <label for="new_password">Nouveau mot de passe:</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                </div>
                <div class="form-group">
                    <label for="new_password_confirmation">Confirmer le nouveau mot de passe:</label>
                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary text-white" style="background-color: #81c408; border: none;">Mettre à jour</button>
            
           
        </div>
    </div>
</div>

@endsection