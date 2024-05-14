<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PharmacieController extends Controller
{
    public function index($nom_pharmacie){
        $pharmacie= DB::table('pharmacie')->where('nom_pharmacie',$nom_pharmacie)->first();
    
        return view('pharmacie',compact('pharmacie'));
    }
}
