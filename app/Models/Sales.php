<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Auth;

class Sales extends Model
{
    use HasFactory;

    protected $table ='sales';
    public $timestamps = true;
  	protected $primaryKey = 'id';

  	protected static function boot(){
    	parent::boot();
    	static::creating(function($model){
    		$model->cashier = Auth::user()->id;
    	});
    }

     protected $fillable = [
     	'transaction_no','item_id','qty_sold','unit_price','discount','vat','payment_mode','cashier','created_at',	'updated_at' 	
    ];
}
