@extends('layouts.master')
@section('title','MediConnect-Medication')
@section('main')
  <!-- Single Page Header start -->
  <div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Medications</h1>
</div>
<!-- Single Page Header End -->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <h1 class="mb-4">Medication</h1>
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                    <div class="col-xl-3">
                        <div class="input-group w-100 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-xl-3">
                        <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                            <label for="fruits">Default Sorting:</label>
                            <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3" form="fruitform">
                                <option value="volvo">Nothing</option>
                                <option value="saab">Popularity</option>
                                <option value="opel">Organic</option>
                                <option value="audi">Fantastic</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <h4>Categories</h4>
                                    <ul class="list-unstyled fruite-categorie">
                                       @foreach ($product as $item)  
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
                        <div class="row g-4 justify-content-center">
                           <!--Product star-->
                           @foreach ($value as $item)
                             
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="rounded position-relative fruite-item">
                                    <div class="fruite-img">
                                        <img src="{{asset('img/medi.jpg')}}" class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    
                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                        <h4>{{$item->nom}}</h4>
                                      <p>Categorie: {{$item->categorie}}</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold mb-0">{{$item->prix}} DH </p>
                                            <a href="{{route('ProductPage',$item->id_produit)}}" class="btn border border-secondary rounded-pill px-3 text-primary"> <i class="fas fa-eye"></i> view</a>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            
                            @endforeach
                            <!--Product fin-->
                           
                       
                <!-- Pagination -->
<div class="col-12">
    <div class="pagination d-flex justify-content-center mt-5">
        @if ($value->onFirstPage())
            <a href="#" class="rounded disabled">&laquo;</a>
        @else
            <a href="{{ $value->previousPageUrl() }}" class="rounded">&laquo;</a>
        @endif

        @foreach ($value->getUrlRange(1, $value->lastPage()) as $page => $url)
            <a href="{{ $url }}" class="rounded @if ($value->currentPage() === $page) active @endif">{{ $page }}</a>
        @endforeach

        @if ($value->hasMorePages())
            <a href="{{ $value->nextPageUrl() }}" class="rounded">&raquo;</a>
        @else
        @if ($value->hasMorePages())
        <a href="{{ $value->nextPageUrl() }}" class="rounded">&raquo;</a>
    @else
        <a href="#" class="rounded disabled">&raquo;</a>
    @endif
        @endif
    </div>
</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fruits Shop End-->
@endsection