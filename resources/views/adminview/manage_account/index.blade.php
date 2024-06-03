@extends('layouts.admin')
@section('title','Manage Users')
@section('main')

<h1>Manage Users</h1>
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('admin.create-user') }}" class="btn btn-primary mb-3">Create User</a>

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if ($user->type === 'admin')
                        Admin
                    @elseif ($user->type === 'owner')
                        Pharmacie
                    @else
                        User
                    @endif
                </td>
                <td>
                    @if ($user->type !== 'admin')
                        <form action="{{ route('admin.make-admin', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-primary">Make Admin</button>
                        </form>
                    @endif
                    <form action="{{ route('admin.delete-user', $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('admin.show-user', $user->id) }}" class="btn btn-sm btn-info">Details</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
