@extends('layouts.master')
@section('title','Search')
@section('main')
  <!-- Single Page Header start -->
  <div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">search</h1>
</div>
<!-- Single Page Header End -->

<!-- favoris Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Med</th>
                    <th scope="col">Name</th>
                    <th scope="col">Categorie</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        
                    
                    <tr>
                        <th scope="row">
                            <div class="d-flex align-items-center">
                                <img src="img/doliprane.png" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                            </div>
                        </th>
                        <td>
                            <p class="mb-0 mt-4">{{$product->nom}}</p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">{{$product->categorie}}</p>
                        </td>
                        
                        <td>
                           
                            <p class="mb-0 mt-4">{{$product->prix}} DH</p>
                        </td>
                  
                       
                        <td>

                            <button class="btn btn-md rounded-circle bg-light border mt-4" onclick="location.href='{{ route('ProductPage', ['id_produit' => $product->id_produit]) }}'">
                                <i class="fas fa-eye text-success"></i>
                            </button>
                            
                        </td>
                    
                    </tr>
                    @endforeach
                   
                  
                </tbody>
            </table>
        </div>
       
       
    </div>
</div>
<!-- Favoris Page End -->

@endsection