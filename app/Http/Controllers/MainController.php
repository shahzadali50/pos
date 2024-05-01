<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function dashboard(){
        $totalOrders = Order::count();
        $totalBrand = Brand::count();
        $totalItems = Product::count();
        $totalcategory = Category::count();
        $totalSale = DB::table('orders')->sum('grand_total');
        $currentDate = Carbon::now();
        // thirty day sale
        $todaySale = $currentDate->subDays();

        $toDaysSale = Order::whereDate('created_at', '>=', $todaySale)->sum('grand_total');

        return view('dashboard', compact('totalOrders','totalBrand','totalItems','totalcategory','totalSale','toDaysSale'));

    }
    public function totalSale(){
        $totalSale = DB::table('orders')->sum('grand_total');
        return view('sales.total-sale', compact('totalSale'));

    }
    public function monthlySale(){
        $currentDate = Carbon::now();
        // thirty day sale
        $thirtyDaysAgo = $currentDate->subDays(30);

        $saleLast30Days = Order::whereDate('created_at', '>=', $thirtyDaysAgo)->sum('grand_total');
        return view('sales.monthly-sale', compact('saleLast30Days'));

    }
    public function weeklySale(){
        $currentDate = Carbon::now();
        // thirty day sale
        $sevenDaysAgo = $currentDate->subDays(7);

        $saleLast7Days = Order::whereDate('created_at', '>=', $sevenDaysAgo)->sum('grand_total');
        return view('sales.weekly-sale', compact('saleLast7Days'));

    }
}
