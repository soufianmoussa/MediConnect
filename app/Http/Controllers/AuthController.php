<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pharmacie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct(){
        $this->middleware("guest")->except("logout");
    }
    public function register()
    {
        return view("auth/register");
    }
    public function pharmacy()
    {
        return view("auth.Pharmacyeregister");
    }

    public function registreSave(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed'
            ]
        )->validate();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => "0"
        ]);

        return redirect()->route("login");
    }

    public function login()
    {
        return view("auth/login");
    }
    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required"
        ])->validate();

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

    $request->session()->regenerate();
    if(auth()->user()->type=='admin'){
        return redirect()->route('admin/home');
    }if(auth()->user()->type== 'owner'){
        return redirect()->route('owner/home');
    }
    else{
    return redirect()->route('home');}
    }


    public function logout(Request $request)
{
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    return redirect('login');
}

public function registerpharmacy(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'pharmacy_name' => 'required|string|max:255',
            'addresse' => 'required|string|max:255',
            'localisation' => 'required|string|max:255',
            'Telephone' => 'required|string|max:15',
        ]);

        // Create the user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), // Hash the password
            'type' => 2, // Set user type to "2" (owner)
        ]);

        // Create the pharmacy
        $pharmacy = Pharmacie::create([
            'nom_pharmacie' => $validatedData['pharmacy_name'],
            'adresse' => $validatedData['addresse'],
            'localisation' => $validatedData['localisation'],
            'Telephone' => $validatedData['Telephone'],
        ]);

        // Establish the many-to-many relationship between user and pharmacy
        $user->pharmacies()->attach($pharmacy->id);

        // Redirect or perform any additional actions
        return redirect()->route('home')->with('success', 'Registration successful!');
    }
}
