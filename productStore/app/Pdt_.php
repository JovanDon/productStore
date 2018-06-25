<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pdt_ extends Model
{
    protected $fillable = ['name','amount_instock','cprice','sprice','qty','expdate']; 
}
