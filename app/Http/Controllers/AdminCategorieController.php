<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminCategorieController extends Controller
{
    public function index()
    {
        $categories = categorie::all();
        if(auth()->user()->type=='admin')
        return view('adminview.categories.index', compact('categories'));
    else
        return view('Pharmacie.categories.index', compact('categories'));
    }
    public function create()
    { if(auth()->user()->type=='admin')
        return view('adminview.categories.create');
        else
        return view('pharmacie.categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:30',
            'description' => 'nullable',
            'imagepath' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max file size as needed
        ]);

        $imagePath = $request->file('imagepath')->store('category_images');

        categorie::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'imagepath' => $imagePath,
        ]);
        if(auth()->user()->type=='admin')
        return redirect()->route('admin/categories')->with('success', 'Category created successfully.');
        else
        return redirect()->route('Pharmacy/categories')->with('success', 'Category created successfully.');
    }

    // Remove the specified category from storage.
    public function destroy(Categorie $category)
    {
        Product::where('categorie', $category->name)->delete();
        $category->delete();
        if(auth()->user()->type=='admin')
        return redirect()->route('admin/categories')->with('success', 'Category deleted successfully.');
        else
        return redirect()->route('Pharmacy/categories')->with('success', 'Category deleted successfully.');
    }

}
