<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Composition extends Model
{
    protected $guarded = [];  
    
    protected $table = 'composition';
    public $primaryKey = 'id';
    public $timestemps = true;
}
