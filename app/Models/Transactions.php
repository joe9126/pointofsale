<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Auth;

class Transactions extends Model
{
    use HasFactory;

     protected $table ='transactions';
    public $timestamps = true;
  	protected $primaryKey = 'id';

  	protected static function boot(){
    	parent::boot();
    	static::creating(function($model){
    		$model->cashier = Auth::user()->id;
    	});
    }

    protected $fillable = [
     	'transaction_no','transubtotal','totalvat','totaldiscount','totalcost','transprofit','payment_mode','cashier','created_at',	'updated_at' 	
    ];
}
