<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoriesController extends Controller
{
    public function index() {
        $value= DB::table('categories')->get();
        return view('categories',compact('value'));
    }
}
