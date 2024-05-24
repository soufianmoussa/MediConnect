<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PharmacieProductController extends Controller
{
    public function showProducts()
    {
        $user = Auth::user();
       
        // Fetch all products for pharmacies owned by the user
        $products = Product::whereHas('pharmacies', function($query) use ($user) {
            $query->whereIn('pharmacie.id', $user->pharmacies->pluck('id'));
        })->get();
    
        return view('pharmacie.product.index', compact('products'));
    }
}
