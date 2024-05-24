@extends('layouts.admin')
@section('title','edit product')
@section('main')
    <h1>edit product</h1>
    <hr>
    <form action="{{route('/admin/products/update',$product->id_produit)}}" method="POST">
        @csrf
        @method('PUT')
    
        <div class="form-group">
            <label for="nom">Title</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{$product->nom}}">
        </div>
    
        <div class="form-group">
            <label for="prix">Price</label>
            <input type="text" class="form-control" id="prix" name="prix" value="{{$product->prix}}">
        </div>
    
        <div class="form-group">
            <label for="id_produit">Product Code</label>
            <input type="text" class="form-control" id="id_produit" name="id_produit" value="{{$product->id_produit}}">
        </div>
    
        <div class="form-group">
            <label for="categorie">Category</label>
            <select class="form-control" id="categorie" name="categorie">
                @foreach ($value as $item)
                    <option value="{{$item->name}}">{{$item->name}}</option>
                @endforeach 
            </select>
        </div>
    
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="">{{$product->description}}</textarea>
        </div>
    
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
    
@endsection