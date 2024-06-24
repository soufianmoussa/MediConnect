@extends("layouts.master")
@section('title','MediConnect - Pharmacie de grade')
@section('style')
<style>
    body {
        background-color: #f8f9fa;
    }
    .card {
        border: 1px solid #81c408;
        border-radius: 10px;
        transition: transform 0.2s;
    }
    .card:hover {
        transform: scale(1.05);
    }
    .card-title {
        color: #81c408;
    }
    .icon {
        color: #81c408;
        font-size: 1.5rem;
        margin-right: 0.5rem;
    }
    .card-text {
        font-size: 1rem;
        color: black;
    }
</style>
@endsection
@section("main")
  <!-- Single Page Header start -->
  <div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Pharmacie De Garde</h1>
</div>
<!-- Single Page Header End -->

<div class="container mt-5">
    <div class="row">
        @foreach($gardes as $garde)
        <div class="col-md-4 mb-4">
            <a href="{{route('pharmacie',['nom_pharmacie'=>$garde->pharmacie->nom_pharmacie])}}" class="card-link">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-clinic-medical icon"></i>{{$garde->pharmacie->nom_pharmacie}}</h5>
                        <p class="card-text"><i class="fas fa-map-marker-alt icon"></i> <strong>Adresse</strong> {{$garde->pharmacie->adresse}}</p>
                        <p class="card-text"><i class="fas fa-phone icon"></i> <strong>Phone:</strong> {{$garde->pharmacie->Telephone}}</p>
                        <p class="card-text"><i class="fas fa-clock icon"></i> <small class="text-muted">{{$garde->la_date}}</small></p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>

    
@endsection
@endsection
