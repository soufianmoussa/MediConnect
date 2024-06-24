<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{//profile need some changes
    public function index()
    {
        $user = Auth::user(); 

        return view('profile', compact('user'));
    }
}
