<?php

namespace App\Http\Controllers;

use App\Models\DetailOrderings;
use App\Models\Ordering;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class DashboardController extends Controller
{
    //

    public function index()
    {

        $popular = DetailOrderings::select('product_name')->selectRaw('SUM(quantity) AS popular')
        ->groupBy('product_name')->orderBy('popular', 'desc')
        ->limit(5)->get();

        $pendapatan = Ordering::selectRaw('year(date_order) as year, monthname(date_order) as month, sum(last_price) as total')
        ->groupBy('year','month')->orderBy('year', 'desc')->orderBy('month', 'asc',)
        ->paginate(8);
        
        return view('admin.dashboard', compact('pendapatan', 'popular'));
    }
}
