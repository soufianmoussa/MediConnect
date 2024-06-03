@extends('layouts.pharmacie')

@section('main')
<div class="container">
    <h1 class="mt-5 mb-4">Profile</h1>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">User Information</h2>
                    <p class="card-text"><strong>Name:</strong> {{ $user->name }}</p>
                    <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Change Password</h2>
                    <form method="POST" action="{{route('pharmacies.profile.password')}}">
                        @csrf
                        

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input id="password" type="password" name="password" class="form-control" required autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm New Password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required autocomplete="new-password">
                        </div>

                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Pharmacy Information</h2>
                    <form method="POST" action="{{ route('pharmacies.profile.update') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nom_pharmacie">Pharmacy Name</label>
                            <input id="nom_pharmacie" type="text" name="nom_pharmacie" value="{{ $pharmacy->nom_pharmacie }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="adresse">Address</label>
                            <input id="adresse" type="text" name="adresse" value="{{ $pharmacy->adresse }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="localisation">Location</label>
                            <input id="localisation" type="text" name="localisation" value="{{ $pharmacy->localisation }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="Telephone">Telephone</label>
                            <input id="Telephone" type="text" name="Telephone" value="{{ $pharmacy->Telephone }}" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Pharmacy Information</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
 
</div>
@endsection
