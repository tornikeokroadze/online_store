<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $guarded = [];  
    
    protected $table = 'services';
    public $primaryKey = 'id';
    public $timestemps = true;
}
