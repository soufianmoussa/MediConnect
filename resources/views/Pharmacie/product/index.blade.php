@extends('layouts.pharmacie')
@section('title','Pharmacy')
@section('main')
<div>
    <h1 class="font-bold text-2xl ml-3">My Product </h1>
    <hr /><br>
    <a href="{{route('/pharmacy/products/create')}}" class="text-white float-right bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Product</a>
    
    </div>
    <table class="table">
       <tr>
            <th>title</th>
            <th>Price</th>
            <th>Product code</th>
            <th>categorie</th>
           
            <th>Action</th>
        </tr>
       
            @foreach ($products as $item)
            <tr>    
                <td>{{$item->nom}}</td>
                <td>{{$item->prix}}</td>
                <td>{{$item->id_produit}}</td>
                <td>{{$item->categorie}}</td>
                
                <td>
                    <div class="d-flex justify-content-start">
                    <a href="#"  class="btn btn-info rounded  mr-2">detail</a> 
                    <a href="#" class="btn btn-warning rounded  mr-2">edit</a>
                    <form action="#" method="POST" onsubmit="return confirm('delete ?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger rounded ">delete</button>
                    </form>
                    </div>
                </td>
                
            </tr>
            @endforeach
       
    </table>
@endsection