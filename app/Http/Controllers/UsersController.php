<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Response,Redirect;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

 
//use App\Models\User;
use Session;

class UsersController extends Controller
{
    public function create(){
    	return view('user.useraccounts');
    }

    public function show(){
    	$users = User::all();
    	return $users;
    }

    public function store(Request $request){
    	$userdata = [
    'name' => $request->get('name'),
    'email' => $request->get('email'),
     'password' => Hash::make($request->get('password')),
     'phone' =>  $request->get('phone'),
      'status' =>  $request->get('status'),
       'role' =>  $request->get('role')];

    	$status = User::where('id','=',$request->id)
					->update($userdata );

		if($status){
			$response =1; $msg=$request->get('fullname')." details updated successfully";
		}else{
			$newuser = new User;
			$newuser -> name = request('name');
    		$newuser -> email = request('email');
    		$newuser -> password = Hash::make(request('password'));
    		$newuser -> phone =  request('phone');
    		$newuser -> status =  request('status');
    		$newuser -> role =  request('role');
    		$status = $newuser -> save();

			$status = User::create($request->all(Hash::make($request->get('password'))));
	 		if($status){
			 	$response =1; $msg=$request->get('fullname')." added successfully";
			}
		}	

		return response()->json(["msg"=>$msg,"response"=>$response]);		

    }
}
