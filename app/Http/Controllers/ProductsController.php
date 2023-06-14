<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Response,Redirect;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\DB;
use App\Models\ProductsModel;

class ProductsController extends Controller{


 public function __construct() {
        $this->middleware('auth')->except(['logout','authenticateuser']);
    }

public function create(){
	return view('products.products',);
}

public function store(Request $request){
		$status = ProductsModel::where('id','=',$request->productid)
					->update($request->except(['profit','productid']));
					
	 	if($status){
	 		$response =1; $msg="Item updated successfully";
	 	}else{
	 		$status = ProductsModel::create($request->all());
	 		if($status){
			 	$response =1; $msg="New item added successfully";
			}
	 	}
		 
		return response()->json(["msg"=>$msg,"response"=>$response]);
	 
}

public function show(ProductsModel $products){
	$products = ProductsModel::select('products.id','products.productname','products.category','products.costprice','products.saleprice','products.stockalarm','products.status','users.name')
	->from('products')->leftjoin('users','products.createdby','=','users.id')
	->orderBy('products.created_at','desc')
	->get();
	return $products;
}
}