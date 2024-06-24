@extends('layouts.master')
@section('title','MediConnect - Alternatives')
@section('main')
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Alternatives for {{ $product->nom }}</h1>
</div>
<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-3">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <h4>Categories</h4>
                            <ul class="list-unstyled fruite-categorie">
                               @foreach ($categories as $item)  
                               <li>
                                    <div class="d-flex justify-content-between fruite-name">
                                        <a href="{{route('products',['nomcat'=>$item->name])}}"><i class="fas fa-first-aid me-2"></i>{{$item->name}}</a>
                                    </div>
                                </li>
                                 @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <h4 class="mb-2">Price</h4>
                            <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput" min="0" max="500" value="0" oninput="amount.value=rangeInput.value">
                            <output id="amount" name="amount" min-velue="0" max-value="500" for="rangeInput">0</output>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row g-4">
                    @foreach ($alternatives as $item)
                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="rounded position-relative fruite-item">
                            <div class="fruite-img">
                                <img src="{{asset('img/medi.jpg')}}" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                <h4>{{ $item->nom }}</h4>
                                <p>Categorie: {{ $item->categorie }}</p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold mb-0">{{ $item->prix }} DH</p>
                                    <a href="{{ route('ProductPage', $item->id_produit) }}" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fas fa-eye"></i> View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
