<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalBrands = Brand::count();
        $totalAllUsers = User::count();
        $totalUsers = User::where('role_as','0')->count();
        $totalAdmins = User::where('role_as','1')->count();
        $today = Carbon::now()->format('d-m-Y');
        $totalOrders = Order::count();
        $todayOrders = Order::whereDate('created_at',$today)->count();
        $thisMonth = Carbon::now()->format('m');
        $thisMonthOrders = Order::whereMonth('created_at',$thisMonth)->count();
        $thisYear = Carbon::now()->format('Y');
        $thisYearOrders = Order::whereYear('created_at',$thisYear)->count();
        return view('admin.dashboard',compact('totalProducts','totalCategories','totalBrands','totalAllUsers',
                                                'totalUsers','totalAdmins','totalOrders','todayOrders',
                                                 'thisMonthOrders','thisYearOrders'));
    }
}
