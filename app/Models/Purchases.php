<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Auth;

class Purchases extends Model
{
    use HasFactory;
 	protected $table ='purchases';
    public $timestamps = true;
  	protected $primaryKey = 'id';

  	protected static function boot(){
    	parent::boot();
    	static::creating(function($model){
    		$model->received_by = Auth::user()->id;
    	});
    }

    protected $fillable = [
     	'itemid','quantity','suppliedby','payment_type','received_by','created_at','updated_at'	
    ];
}
