<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];  
    
    protected $table = 'category';
    public $primaryKey = 'id';
    public $timestemps = true;
}

