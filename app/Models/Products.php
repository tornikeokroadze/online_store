<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $guarded = [];  
    
    protected $table = 'products';
    public $primaryKey = 'id';
    public $timestemps = true;

    public function category() {
        return $this->belongsTo('App\Models\Category','category_id','id');
    }

    public function composition() {
        return $this->belongsTo('App\Models\Composition','composition_id','id');
    }
}
