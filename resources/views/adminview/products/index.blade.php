@extends('layouts.admin')
@section('title','Home Product')
@section('main')

<div>
<h1 class="font-bold text-2xl ml-3">Home Product List</h1>
<hr /><br>
<a href="{{route('/admin/products/create')}}" class="text-white float-right bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Product</a>

</div>
<table class="table">
   <tr>
        <th>title</th>
        <th>Price</th>
        <th>Product code</th>
        <th>categorie</th>
       
        <th>Action</th>
    </tr>
   
        @foreach ($product as $item)
        <tr>    
            <td>{{$item->nom}}</td>
            <td>{{$item->prix}}</td>
            <td>{{$item->id_produit}}</td>
            <td>{{$item->categorie}}</td>
            
            <td>
                <div class="d-flex justify-content-start">
                <a href="{{route('/admin/products/show',$item->id_produit)}}"  class="btn btn-info rounded  mr-2">detail</a> 
                <a href="{{route('/admin/products/edit',$item->id_produit)}}" class="btn btn-warning rounded  mr-2">edit</a>
                <a href="{{route('product.show',$item->id_produit)}}" class="btn btn-primary rounded  mr-2">Assing pharmacys</a> 
                <form action="{{route('/admin/poroducts/destroy',$item->id_produit)}}" method="POST" onsubmit="return confirm('delete ?')">
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