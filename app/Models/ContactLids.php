<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactLids extends Model
{
    protected $guarded = [];  
    
    protected $table = 'contact_lids';
    public $primaryKey = 'id';
    public $timestemps = true;
}
