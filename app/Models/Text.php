<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    protected $guarded = [];  
    
    protected $table = 'text';
    public $primaryKey = 'id';
    public $timestemps = true;
}
