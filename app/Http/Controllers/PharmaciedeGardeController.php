<?php

namespace App\Http\Controllers;

use App\Models\Garde;
use Illuminate\Http\Request;

class PharmaciedeGardeController extends Controller
{
   public function index(){
    $gardes = Garde::with('pharmacie')->orderBy('la_Date','asc')->get();
    return view('PharmaciedeGarde',compact('gardes'));
   }
}
