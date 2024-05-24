@extends('layouts.Pharmacie')

@section('title', 'Create Category')

@section('main')
<div>
    <h1 class="font-bold text-2xl ml-3">Create category</h1>
    <hr /><br>

    </div>
    <div class="container">
        <form action="{{ route('pharmacy.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter category description"></textarea>
            </div>
            <div class="form-group">
                <label for="imagepath">Image</label>
                <input type="file" class="form-control-file" id="imagepath" name="imagepath" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
