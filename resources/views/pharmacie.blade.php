@extends('layouts.master')
@section('title','MediConnect - Pharmacie')
@section('main')
 <!-- Single Page Header start -->
 <div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Pharmacie</h1>
</div>
 <!-- Contact Start -->
 <div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="p-5 bg-light rounded">
            <div class="row g-4">
                <div class="col-12">
                    <div class="text-center mx-auto" style="max-width: 700px;">
                        <h1 class="text-primary">{{$pharmacie->nom_pharmacie}}</h1>
                    </div>
                </div>
                
                <div class="col-lg-7">
                   <img src="/img/pharmacie.jpg" class="rounded" alt="phrmacie" width="700" height="400">
                </div>
                <div class="col-lg-5">
                    <div class="d-flex p-4 rounded mb-4 bg-white">
                        <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Address</h4>
                            <p class="mb-2">{{$pharmacie->adresse}}</p>
                        </div>
                    </div>
                    <div class="d-flex p-4 rounded mb-4 bg-white">
                        <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Mail Us</h4>
                            <p class="mb-2">pharmacie@gmail.com</p>
                        </div>
                    </div>
                    <div class="d-flex p-4 rounded bg-white">
                        <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Telephone</h4>
                            <p class="mb-2">{{$pharmacie->Telephone}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="h-100 rounded">
                        <iframe class="rounded w-100" 
                        style="height: 400px;" src="{{$pharmacie->localisation}}" 
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

@endsection