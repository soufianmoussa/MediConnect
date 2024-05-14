<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productController extends Controller

{
   public function index($nomcat){
    //  dd($catid);
      $result= DB::table('produit')->where('categorie',$nomcat)->paginate(12);
      $product= DB::table('categories')->get();
    return view("Products",["value"=>$result,"product"=>$product]);
   }

   public function search(Request $request){
    $query = $request->input('query');

    $products = Product::where('nom', 'like', "%$query%")->get();
  
    return view('search', compact('products'));
   }
}
