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
        return view('adminview.categories.index', compact('categories'));
    }
    public function create()
    {
        return view('adminview.categories.create');
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

        return redirect()->route('admin/categories')->with('success', 'Category created successfully.');
    }

    // Remove the specified category from storage.
    public function destroy(Categorie $category)
    {
        Product::where('categorie', $category->name)->delete();
        $category->delete();
        return redirect()->route('admin/categories')->with('success', 'Category deleted successfully.');
    }

}
