<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Product;
use App\Models\Pharmacie;
use App\Charts\UsersChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    public function index(){
        $value= DB::table('produit')->get();
       
        return view("welcome",["produit"=>$value]);
    }
    public function adminhome(){
          // Get counts
          $userCount = User::count();
          $productCount = Product::count();
          $pharmacyCount = Pharmacie::count();
  
          $userName = auth()->user()->name;
          $months = [];
          $counts = [];
      
         $months = [];
      $counts = [];
  
      // Get the current month and year
      $currentMonth = Carbon::now()->month;
      $currentYear = Carbon::now()->year;
  
      // Loop through each month from January to the current month
      for ($month = 1; $month <= $currentMonth; $month++) {
          // Get the start of the month
          $startDate = Carbon::createFromDate($currentYear, $month, 1)->startOfMonth();
          
          // Get the end of the month
          $endDate = $startDate->copy()->endOfMonth();
          
          // Count the number of products created between the start and end dates
          $count = Product::whereBetween('created_at', [$startDate, $endDate])->count();
          
          // Add the month name and count to the arrays
          $months[] = $startDate->format('F'); // Full month name
          $counts[] = $count;
      }
  
        return view("adminview.dashboard",compact( 'userCount', 'productCount', 'pharmacyCount','userName', 'months', 'counts'));
    }
    
    
    public function ownerhome(){
        // Get counts
        $userCount = User::count();
        $productCount = Product::count();
        $pharmacyCount = Pharmacie::count();

        $userName = auth()->user()->name;
        $months = [];
        $counts = [];
    
       $months = [];
    $counts = [];

    // Get the current month and year
    $currentMonth = Carbon::now()->month;
    $currentYear = Carbon::now()->year;

    // Loop through each month from January to the current month
    for ($month = 1; $month <= $currentMonth; $month++) {
        // Get the start of the month
        $startDate = Carbon::createFromDate($currentYear, $month, 1)->startOfMonth();
        
        // Get the end of the month
        $endDate = $startDate->copy()->endOfMonth();
        
        // Count the number of products created between the start and end dates
        $count = Product::whereBetween('created_at', [$startDate, $endDate])->count();
        
        // Add the month name and count to the arrays
        $months[] = $startDate->format('F'); // Full month name
        $counts[] = $count;
    }

    
        // Pass data to the view
        return view("Pharmacie.dashboard", compact( 'userCount', 'productCount', 'pharmacyCount','userName', 'months', 'counts'));
    }
}
