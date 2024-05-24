@extends('layouts.admin')
@section('title','show Products')
    
@section('main')
    <h1>Detail Product</h1>
    <hr>
    <div class="mt-2">
        <h4>Product ID</h4>
        <p>{{$product->id_produit}}</p>
    </div>
    
    <div class="mt-2">
        <h4>Title</h4>
        <p>{{$product->nom}}</p>
    </div>
    
    <div class="mt-2">
        <h4>Category</h4>
        <p>{{$product->categorie}}</p>
    </div>
    
    <div class="mt-2">
        <h4>Price</h4>
        <p>{{$product->prix}}</p>
    </div>
    
    <div class="mt-2">
        <h4>Description</h4>
        <p>{{$product->description}}</p>
    </div>
    
    <div class="mt-2">
        <h4>Created At</h4>
        <p>{{$product->created_at}}</p>
    </div>
    
    <div class="mt-2">
        <h4>Last Updated</h4>
        <p>{{$product->updated_at}}</p>
    </div>
    
@endsection