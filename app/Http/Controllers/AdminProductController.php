<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Pharmacie;
use Illuminate\Http\Request;
use App\Models\produit_pharmacie;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $product=Product::orderBy("created_at","desc")->paginate(8);
        return view("adminview.products.index",compact("product"));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {  $value= DB::table('categories')->get();
        $pharmacie= DB::table('pharmacie')->get();
        if(auth()->user()->type=='admin')
        return view("adminview.products.create",compact("value","pharmacie"));
        else
        return view("pharmacie.product.create",compact("value","pharmacie"));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        if ($user->type == 'admin') {
            Product::create($request->all());
            return redirect()->route("admin/products")->with("success", "Product added successfully.");
        } else {
            // Retrieve the pharmacy IDs associated with the user
            $pharmacyIds = $user->pharmacies->pluck('id');

            if ($pharmacyIds->isEmpty()) {
                return redirect()->route("pharmacies.products")->with("error", "No associated pharmacies found.");
            }

            // Check if the product already exists
            $product = Product::where('nom', $request->input('nom'))->first();

            if ($product) {
                // If product exists, attach it to all pharmacies associated with the user
                foreach ($pharmacyIds as $pharmacyId) {
                    $product->pharmacies()->attach($pharmacyId);
                }
            } else {
                // If product does not exist, create it and attach to all pharmacies associated with the user
                $product = Product::create($request->all());
                foreach ($pharmacyIds as $pharmacyId) {
                    $product->pharmacies()->attach($pharmacyId);
                }
            }

            return redirect()->route("pharmacies.products")->with("success", "Product added successfully.");
        }
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id_produit)
    {
        $product=Product::findOrFail($id_produit);
        return view("adminview.products.show",compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    { $value= DB::table('categories')->get();
        $product=Product::findOrFail($id);
        return view("adminview.products.edit",compact("product","value"));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        $product=Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route("admin/products")->with("success","updated");
    }

    /**
     * Remove the specified resource from storage.
     *
    
     */
    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $product->delete();
        return redirect()->route("admin/products")->with("success","deleted");
    }

    public function AssignPage($id)
    {
        $product = Product::with('pharmacies')->findOrFail($id);
        $Pharmacies = Pharmacie::all();
        return view('adminview.products.AssignPh', compact('product', 'Pharmacies'));
        
    }

    public function addPharmacies(Request $request, $id)
{
    $product = Product::findOrFail($id);
    $request->validate([
        'pharmacy' => 'required|exists:pharmacie,id',
    ]);

   
    $product->pharmacies()->syncWithoutDetaching([$request->pharmacy]);
    return redirect()->route('admin/products', $id)->with('success', 'Pharmacies assigned successfully.');
}
  
}
