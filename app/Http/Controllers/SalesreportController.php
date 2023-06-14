<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Response,Redirect;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;
use App\Models\ProductsModel;
use App\Models\Transactions;
use App\Models\Sales;
use App\User;
use Session;
use Carbon\Carbon;

class SalesreportController extends Controller
{
    public function create(){

    	return view('sales.salesreport');
    }
    public function show(){
    	$annualsales = Sales::select('sales.transaction_no','sales.created_at','products.productname','products.category','sales.qty_sold','sales.unit_price','sales.discount','sales.vat','sales.payment_mode','users.name')
    		->leftjoin('products','sales.item_id','=','products.id')
    		->leftjoin('users','sales.cashier','=','users.id')
    		->whereYear('sales.created_at','=',Carbon::now()->year)
    		->orderBy('sales.created_at','desc')
    		->get();

    		return $annualsales;
    }

    public function topfiveProducts(){
        $results = Sales::select('sales.item_id','products.productname',DB::raw('SUM(sales.qty_sold) as qtysold'),DB::raw('SUM(sales.qty_sold * sales.unit_price) as itemTotal'))
        ->leftjoin('products','sales.item_id','=','products.id') 
        ->whereMonth('sales.created_at','=',Carbon::now()->month)
        ->groupBy('sales.item_id')
        ->orderBy('itemTotal','desc')
        ->limit(5)
        ->get();
                   

                return $results;
    }

    public function totalmonthSales(){
         $results = Sales::select(DB::raw('SUM(qty_sold * unit_price) as monthTotal'))
                    ->whereMonth('sales.created_at','=',Carbon::now()->month)
                    ->get();

                    return $results;
    }
}
