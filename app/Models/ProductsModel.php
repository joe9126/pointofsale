<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProductsModel extends Model
{
    use HasFactory;

    protected $table ='products';
    public $timestamps = true;
  protected $primaryKey = 'id';
    /*protected $casts = [
    	$costprice =>'double',
    	$saleprice =>'double',
    	$stockalarm =>'tinyInt'
    ];*/

    
    protected static function boot(){
    	parent::boot();
    	static::creating(function($model){
    		$model->createdby = Auth::user()->id;
    	});
    }

    protected $fillable = [
    	'productname','category','costprice','saleprice','stockalarm','created_at','updated_at','status','createdby'
    ];



}
