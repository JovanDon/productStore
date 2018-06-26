<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pdt extends Model
{
    protected $fillable = ['name','amount_instock','cprice','sprice','qty','expdate','user_id','supplier_certificate'];   
    
    
}
