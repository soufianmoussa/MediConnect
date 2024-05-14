<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\favorite;

class FavorisController extends Controller
{
    public function index(){
        $favorites = Auth::user()->favorites()->with('produit')->get();
        return view("favoris", compact("favorites"));
       
    }
    public function addToFavorites($itemId)
    {
        $user = Auth::user();
        $favorite = new Favorite();
        $favorite->user_id = $user->id;
        $favorite->product_id = $itemId; 
        $favorite->save();
    
    
        return redirect()->back()->with('success', 'Item added to favorites.');
    }
    
    public function removeFromFavorites($itemId)
{
    $user = Auth::user();
    // Find the favorite by item ID and user ID and delete it
    $user->favorites()->where('product_id', $itemId)->delete();

    return redirect()->back()->with('success', 'Item removed from favorites.');
}

    
}
