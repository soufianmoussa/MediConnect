@extends('layouts.admin')
@section('title','categoris')
@section('main')
<div>
    <h1 class="font-bold text-2xl ml-3">Category List</h1>
    <hr /><br>
    <a href="{{route('admin.categories.create')}}" class="text-white float-right bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add category</a>
    
    
    </div>

<div class="container">

    <table class="table">
        <thead>
            <tr>
              
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
               
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td> <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                </form>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection