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

class ReportsController extends Controller
{
     public function create(){
    	return view('sales.salesanalysis');
    }

    /*ANNUAL GROSS SALES*/

    public function annualgrossSales(){
    	$results = Transactions::select(DB::raw('MONTHNAME(created_at) as month,SUM(transubtotal) monthgross_sale'))
    					->from('transactions')
    					->whereYear('created_at','=',Carbon::now()->year)
    					 ->groupBy(DB::raw('MONTHNAME(created_at)'))
    					->orderBy(DB::raw('MONTH(created_at)','asc'))
    					->get();

    					return $results;
    }

    public function annualsaleData(){
    	$results = Transactions::select(DB::raw('SUM(transubtotal) as annual_gross, SUM(totaldiscount) as annual_discs, SUM(transprofit) as annual_profit, SUM(totalcost) as annual_cost'))
    					->from('transactions')
    					->whereYear('created_at','=',Carbon::now()->year)
    					 ->get();
    	return $results;
    }


    /*MONTHLY GROSS SALESS*/

    public function monthlygrossSales(){
    	$results = Transactions::select(DB::raw('DAY(created_at) as day,SUM(transubtotal) dailygross_sale'))
    					->from('transactions')
    					->whereMonth('created_at','=',Carbon::now()->month)
    					->groupBy(DB::raw('DAY(created_at)'))
    					->orderBy(DB::raw('DAY(created_at)','asc'))
    					 ->get();
    	return $results;
    }
      public function monthlysaleData(){
    	$results = Transactions::select(DB::raw('SUM(transubtotal) as monthly_gross, SUM(totaldiscount) as monthly_discs, SUM(transprofit) as monthly_profit, SUM(totalcost) as monthly_cost'))
    					->from('transactions')
    					->whereMonth('created_at','=',Carbon::now()->month)
    					 ->get();
    	return $results;
    }


/* DAILY GROSS SALE   */

public function todaysaleData(){
	$results = Transactions::select(DB::raw('products.productname as productname,SUM(sales.qty_sold*sales.unit_price) as 						 productsale'))
						->from('products')
						->leftjoin('sales','products.id','=','sales.item_id')
						->whereRaw("DATE_FORMAT(sales.created_at,'%Y-%m-%d') = CURDATE()")
						->groupBy('products.productname')
    					->orderBy('products.productname','asc')
						->get();

			return $results;
	}
}