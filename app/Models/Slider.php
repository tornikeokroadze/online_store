<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $guarded = [];  
    
    protected $table = 'slider';
    public $primaryKey = 'id';
    public $timestemps = true;
}
