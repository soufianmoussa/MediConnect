<!-- resources/views/adminview/manage_account/create.blade.php -->
@extends('layouts.admin')
@section('title','Create User')
@section('main')

<h1>Create User</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.store-user') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <select class="form-control" id="type" name="type" required onchange="togglePharmacieFields(this.value)">
            <option value="0">User</option>
            <option value="1">Admin</option>
            <option value="2">Pharmacie</option>
        </select>
    </div>
    <div id="pharmacieFields" style="display:none;">
        <div class="mb-3">
            <label for="pharmacy_name" class="form-label">Pharmacy Name</label>
            <input type="text" class="form-control" id="pharmacy_name" name="pharmacy_name" value="{{ old('pharmacy_name') }}">
        </div>
        <div class="mb-3">
            <label for="addresse" class="form-label">Address</label>
            <input type="text" class="form-control" id="addresse" name="addresse" value="{{ old('addresse') }}">
        </div>
        <div class="mb-3">
            <label for="localisation" class="form-label">Localisation</label>
            <input type="text" class="form-control" id="localisation" name="localisation" value="{{ old('localisation') }}">
        </div>
        <div class="mb-3">
            <label for="Telephone" class="form-label">Telephone</label>
            <input type="text" class="form-control" id="Telephone" name="Telephone" value="{{ old('Telephone') }}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>

<script>
    function togglePharmacieFields(type) {
        var pharmacieFields = document.getElementById('pharmacieFields');
        if (type == 2) {
            pharmacieFields.style.display = 'block';
        } else {
            pharmacieFields.style.display = 'none';
        }
    }
</script>

@endsection
