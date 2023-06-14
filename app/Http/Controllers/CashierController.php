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

class CashierController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['logout','authenticateuser']);
    }

    public function create(){
    	return view('sales.pointofsale');
    }

    public function show(){
    	$productregister = ProductsModel::all('id','productname');

    	return $productregister;
    }

    public function store(Request $request){
    	$status = Sales::create($request->all());
    		if($status->exists){
    			 $response =1; $msg="Transaction completed successfully";
    		}else{
    			 $response =0; $msg="Transaction was not completed,something went wrong!";
    		}
    		 return response()->json(["msg"=>$msg,"response"=>$response]);
      }

    public function edit(){}

    public function delete(){}

    public function searchproduct(Request $request){
    	$searchresults = ProductsModel::select('products.id','products.productname','products.saleprice','inventory.stockqty','products.status')
    						->from('products')
    						->leftjoin('inventory','products.id','=','inventory.product_id')
    						->where('products.productname','=',$request->get('searchphrase'))
    						->get()	;
    			return $searchresults;
    }

    public function getproductinfo(Request $request){
    	$searchresults = ProductsModel::select('id','productname','costprice')
    						->where('id','=',$request->get('searchid'))
    						->get()	;
    			return $searchresults;
    }

    public function createTransaction(Request $request){
    	$status = Transactions::create($request->all());
    	if($status->exists){
    		$response =1;
    	}else{
    		$response =0;
    	}
    	return response()->json(["response"=>$response]);
    }

    public function retrieveReceipt(Request $request){
         $transdata = Sales::select('sales.transaction_no','products.productname','sales.qty_sold','sales.unit_price','sales.discount','sales.vat')
            ->leftjoin('products','sales.item_id','=','products.id')
            ->where('sales.transaction_no','=',$request->get('trans_no'))
            ->orderBy('sales.created_at','desc')
            ->get();
       
        return view('sales.posreceipt',compact('transdata'));
        }
    }
 
