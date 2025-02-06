<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];  
    
    protected $table = 'contact';
    public $primaryKey = 'id';
    public $timestemps = true;
}
