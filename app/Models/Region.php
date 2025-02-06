<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $guarded = [];  
    
    protected $table = 'region';
    public $primaryKey = 'id';
    public $timestemps = true;
}
