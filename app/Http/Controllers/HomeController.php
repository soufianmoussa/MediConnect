<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    public function index(){
        $value= DB::table('produit')->where('categorie','Analgesics')->get();
        return view("welcome",["produit"=>$value]);
    }
    public function adminhome(){
        return view("adminview.dashboard");
    }
    public function ownerhome(){
        return view("Pharmacie.dashboard");
    }
}
