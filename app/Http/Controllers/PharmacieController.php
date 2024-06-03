<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PharmacieController extends Controller
{
    public function index($nom_pharmacie){
        $pharmacie= DB::table('pharmacie')->where('nom_pharmacie',$nom_pharmacie)->first();
    
        return view('pharmacie',compact('pharmacie'));
    }
   

    public function profileshow()
    {
        $user = Auth::user();
        $pharmacy = $user->pharmacies()->first(); // Assuming a user belongs to only one pharmacy
        
        return view('Pharmacie.profile', compact('user', 'pharmacy'));
    }
    public function update(Request $request)
    {
        $user = auth()->user();
        $pharmacy = $user->pharmacies()->first();
    
        $request->validate([
            'nom_pharmacie' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'localisation' => 'required|string|max:255',
            'Telephone' => 'required|string|max:20',
        ]);
    
        $pharmacy->update([
            'nom_pharmacie' => $request->nom_pharmacie,
            'adresse' => $request->adresse,
            'localisation' => $request->localisation,
            'Telephone' => $request->Telephone,
        ]);
    
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function changePassword(Request $request)
    {
        // Validate the request data
        $request->validate([
            'password' => 'required|string|min:8|confirmed', // Ensure password and password_confirmation match
        ]);

        // Get the authenticated user
        $user = auth()->user();

        // Update the user's password
        $user->update([
            'password' => Hash::make($request->password), // Hash the new password
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Password changed successfully.');
    }
}
