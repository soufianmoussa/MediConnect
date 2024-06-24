<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductpageController extends Controller
{
    public function index($id_produit)
    {
        $product = Product::findOrFail($id_produit);
        $allproduct = Product::get();
        $categories = DB::table('categories')->get();
        
        $medicine = Product::findOrFail($id_produit);
        $pharmacies = $medicine->pharmacies;

        return view("ProductPage", compact("product", "categories", "allproduct", "pharmacies"));
    }

   public function showAlternatives($id)
   {
       $product = Product::find($id);
       $substance = $product->substance; // Assuming you have a substance field in your Product model
       $alternatives = Product::where('substance', $substance)->where('id_produit', '!=', $id)->orderBy('prix')->get();
       $categories = categorie::all();
       return view('alternatives', compact('product', 'alternatives', 'categories'));
   }
}
