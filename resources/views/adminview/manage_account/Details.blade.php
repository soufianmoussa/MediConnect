@extends('layouts.admin')
@section('title','User Details')
@section('main')

<h1>User Details</h1>

<div class="card ">
    <div class="card-header">
        {{ $user->name }}
    </div>
    <div class="card-body">
        <h5 class="card-title">Email: {{ $user->email }}</h5>
        <p class="card-text">Type: 
            @if ($user->type === 'admin')
                Admin
            @elseif ($user->type === 'owner')
                Pharmacie
            @else
                User
            @endif
        </p>
        @if ($user->type === 'owner' && $user->pharmacies->isNotEmpty())
            <h5 class="card-title">Pharmacy Details</h5>
            @foreach ($user->pharmacies as $pharmacie)
                <p class="card-text"><strong>Pharmacy Name:</strong> {{ $pharmacie->nom_pharmacie }}</p>
                <p class="card-text"><strong>Address:</strong> {{ $pharmacie->adresse }}</p>
                {{-- <p class="card-text"><strong>Localisation:</strong> {{ $pharmacie->localisation }}</p> --}}
                <p class="card-text"><strong>Telephone:</strong> {{ $pharmacie->Telephone }}</p>
            @endforeach
        @endif
        <a href="{{ route('admin.manage-users') }}" class="btn btn-primary">Back to Users</a>
    </div>
</div>

@endsection
