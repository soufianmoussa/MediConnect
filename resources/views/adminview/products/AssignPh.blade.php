@extends('layouts.admin')

@section('title', 'Assign Pharmacy')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            {{-- Show product details --}}
            <div class="card mt-4">
                <div class="card-body">
                    <h1 class="card-title">{{ $product->nom }}</h1>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text"><strong>Price:</strong> {{ $product->prix }} DH</p>
                </div>
            </div>

            {{-- Form to add pharmacies --}}
            <div class="card mt-4">
                <div class="card-body">
                    <h2 class="card-title">Assign Pharmacy</h2>
                    <form action="{{ route('product.addPharmacies', $product->id_produit) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="pharmacy">Pharmacy:</label>
                            <select name="pharmacy" id="pharmacy" class="form-control">
                                <option value="">Select a pharmacy</option>
                                @foreach($Pharmacies as $pharmacie)
                                    <option value="{{ $pharmacie->id }}">
                                        {{ $pharmacie->nom_pharmacie }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Add Pharmacy</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
