<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pharmacie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageUsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('adminview.manage_account.index', compact('users'));
    }

    public function create()
    {
        return view('adminview.manage_account.create');
    }

    public function store(Request $request)
    {
        // Common validation rules
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'type' => 'required|integer|between:0,2',
        ]);

        // Additional validation for pharmacie type
        if ($request->type == "owner") {
            $request->validate([
                'pharmacy_name' => 'required|string|max:255',
                'addresse' => 'required|string|max:255',
                'localisation' => 'required|string',
                'Telephone' => 'required|string|max:15',
            ]);
        }

        // Create the user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'type' => $validatedData['type'],
        ]);

        // Create the pharmacy if the user is a pharmacie
        if ($user->type == "owner") {
            $pharmacy = Pharmacie::create([
                'nom_pharmacie' => $request->pharmacy_name,
                'adresse' => $request->addresse,
                'localisation' => $request->localisation,
                'Telephone' => $request->Telephone,
            ]);

            // Establish the relationship
            $user->pharmacies()->attach($pharmacy->id);
        }

        return redirect()->route('admin.manage-users')->with('success', 'User created successfully');
    }

    public function makeAdmin(User $user)
    {
        $user->type = 1; // Assuming '1' is for admin
        $user->save();

        return redirect()->route('admin.manage-users')->with('success', 'User updated to admin successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.manage-users')->with('success', 'User deleted successfully');
    }

    public function show(User $user)
    {
        $user->load('pharmacies');
        return view('adminview.manage_account.Details', compact('user'));
    }
}
