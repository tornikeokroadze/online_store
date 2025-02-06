<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $guarded = [];  
    
    protected $table = 'faq';
    public $primaryKey = 'id';
    public $timestemps = true;
}
