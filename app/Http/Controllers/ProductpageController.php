<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductpageController extends Controller
{
   public function index($id_produit){
    $product=Product::findOrFail($id_produit);
    $allproduct=Product::get();
    $categories= DB::table('categories')->get();

    $medicine = Product::findOrFail($id_produit);
    $pharmacies = $medicine->pharmacies;
    return view("ProductPage",compact("product","categories","allproduct","pharmacies"));
   }
}
