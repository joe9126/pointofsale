<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	if(Auth::check()){
		return view('user.maindashboard');
	}else{
		return view('auths.login');
	}
    
});//->name('login');

//Route::get('login',['as'=>'login','uses'=>'App\Http\Controllers\AuthController@index'] );

 Route::get('login',array('as'=>'login',function(){
    return view('auths.login');
}))->name('login');

Route::get('/',function(){
	return view('auths.login');
})->name('login');


Route::post('authenticateuser','App\Http\Controllers\AuthController@authenticateUser');

Route::get('logout','App\Http\Controllers\AuthController@logout');

Route::post('v1/access/token', 'App\Http\Controllers\MpesaController@generateAccessToken');
Route::post('v1/hlab/stk/push', 'App\Http\Controllers\MpesaController@customerMpesaSTKPush');
Route::post('v1/hlab/validation', 'App\Http\Controllers\MpesaController@mpesaValidation');
Route::post('v1/hlab/transaction/confirmation', 'App\Http\Controllers\MpesaController@mpesaConfirmation');
Route::post('v1/hlab/register/url', 'App\Http\Controllers\MpesaController@mpesaRegisterUrls');


/* PROTECTED ROUTES  */

Route::group(['middleware'=>'auth'],function(){
	
	Route::get('dashboard',function(){
		return view('user.userdashboard');
	});

	Route::get('products','App\Http\Controllers\ProductsController@create');

	Route::get('showproducts','App\Http\Controllers\ProductsController@show');

	Route::post('addnewitem','App\Http\Controllers\ProductsController@store');

	Route::get('inventory','App\Http\Controllers\InventoryController@create');

	Route::get('getstock','App\Http\Controllers\InventoryController@show');

	Route::post('addstock','App\Http\Controllers\InventoryController@store');

	Route::get('pointofsale','App\Http\Controllers\CashierController@create');
	
	Route::get('getproductregistry','App\Http\Controllers\CashierController@show');

	Route::get('searchproduct','App\Http\Controllers\CashierController@searchproduct');

	Route::get('pos/getitemDetails','App\Http\Controllers\CashierController@getproductinfo');

	Route::post('pos/createtransaction','App\Http\Controllers\CashierController@createTransaction');

	Route::post('pos/transact_sale','App\Http\Controllers\CashierController@store');

	Route::get('salesanalysis','App\Http\Controllers\ReportsController@create');

	Route::get('annualgrosssales','App\Http\Controllers\ReportsController@annualgrossSales');

	Route::get('annualsaledata','App\Http\Controllers\ReportsController@annualsaleData');

	Route::get('monthlygross','App\Http\Controllers\ReportsController@monthlygrossSales');
	Route::get('monthlysaledata','App\Http\Controllers\ReportsController@monthlysaleData');

	Route::get('todaygross','App\Http\Controllers\ReportsController@todaysaleData');

	Route::get('receiptprinter','App\Http\Controllers\CashierController@retrieveReceipt');

	Route::get('getTransaction','App\Http\Controllers\CashierController@getTransactiondata');
	
	Route::get('salesreports','App\Http\Controllers\SalesreportController@create');

	Route::get('generalsales','App\Http\Controllers\SalesreportController@show');

	Route::get('top_products','App\Http\Controllers\SalesreportController@topfiveProducts');	

	Route::get('monthsales','App\Http\Controllers\SalesreportController@totalmonthSales');

	Route::get('users','App\Http\Controllers\UsersController@create');

	Route::get('getusers','App\Http\Controllers\UsersController@show');

	Route::post('submituser','App\Http\Controllers\UsersController@store');

});