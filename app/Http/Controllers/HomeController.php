<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $purchaseCounts = Purchase::select(DB::raw('MONTH(created_at) as month'),
        DB::raw('COUNT(1) as count'))->groupby('month')->get()->toArray();

        $saleCounts = Sale::select(DB::raw('MONTH(created_at) as month'),
        DB::raw('COUNT(1) as count'))->groupby('month')->get()->toArray();


        // $purchases = array_fill(0,12,0); //index , qty ,value
        // $sales = array_fill(0,12,0); //index , qty ,value
        $purchases = [];
        $sales = [];
        foreach ($purchaseCounts as $monthlyCount) {
            $index = $monthlyCount['month']-1;
            $purchases[$index] = $monthlyCount['count'];
        }
        foreach ($saleCounts as $monthlyCount) {
            $index = $monthlyCount['month']-1;
            $sales[$index] = $monthlyCount['count'];
        }
        //  dd($purchases);
        return view('home',compact('sales','purchases'));
    }
}
