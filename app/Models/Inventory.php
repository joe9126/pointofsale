<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Auth;

class Inventory extends Model
{
    use HasFactory;
    protected $table ='inventory';
    public $timestamps = true;

 protected static function boot(){
    	parent::boot();
    	static::creating(function($model){
    		$model->updatedby = Auth::user()->id;
    	});
    }

    protected $fillable =[
    	'product_id','stockqty','updatedby','created_at','updated_at'
    ];
}
