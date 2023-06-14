<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator,Response,Redirect;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\DB;
use App\Models\Inventory;
use App\Models\ProductsModel;
use App\Models\Purchases;

class InventoryController extends Controller
{
    public function __construct() {
        //$this->middleware('auth',except(['logout','authenticateuser']));
    }

     public function create(){
     	return view('products.inventory');
     }

      public function store(Request $request){
        $status = 0;
       $status = Inventory::create([
          'product_id'=>$request->get('productid'),
          'stockqty'=>$request->get('stockqty')
                ]);
        if($status->exists){
           $status = Purchases::create([
            'itemid'=>$request->get('productid'),
            'quantity'=>$request->get('stockqty'),
            'suppliedby'=>$request->get('supplier'),
            'payment_type'=>$request->get('paymenttype'),
            'supply_comment'=>$request->get('suppliercomment')
        ]);

        }
        if($status->exists){
            $response =1; $msg=$request->get('stockqty')." items added successfully";
        }else{
          $response =0; $msg="An error occured!";
    }
    return response()->json(["msg"=>$msg,"response"=>$response]);
        }
      
      

       public function show(){
       		$productstock = Inventory::select('products.id','products.productname','products.category','inventory.stockqty','inventory.updated_at','users.name')
            ->from('products')
            ->leftjoin('inventory','products.id','=','inventory.product_id')
            ->leftjoin('users','inventory.updatedby','=','users.id')
       			->orderBy('inventory.stockqty','desc')
       			->get();

       			return $productstock;
       }

        public function edit(){}

         public function update(){}

         public function delete(){}
}
