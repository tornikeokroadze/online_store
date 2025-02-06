<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];  
    
    protected $table = 'cart';
    public $primaryKey = 'id';
    public $timestemps = true;

    public function products() {
        return $this->belongsTo('App\Models\Products','products_id','id');
    }

    public function user() {
        return $this->belongsTo('App\Models\User','users_id','id');
    }

}
