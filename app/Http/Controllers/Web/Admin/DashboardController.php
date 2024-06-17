<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $countProducts = Product::count();
        $countNewProducts = Product::whereDate('created_at', '>=', Carbon::now()->subWeek())->count();
        
        $countUsers = User::count();
        $countNewUsers = User::whereDate('created_at', '>=', Carbon::now()->subWeek())->count();
        
        $countCategories = Category::count();
        $countNewCategories = Category::whereDate('created_at', '>=', Carbon::now()->subWeek())->count();
        
        $countOrders = Order::count();
        $countNewOrders = Order::whereDate('created_at', '>=', Carbon::now()->subWeek())->count();
        
        return view('admin.dashboard',
        compact('countProducts','countNewProducts',
        'countUsers','countNewUsers',
        'countCategories','countNewCategories',
        'countOrders','countNewOrders'
        )
        );
    }
}
