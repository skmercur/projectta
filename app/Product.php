<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name_product', 'name_categorie','code', 'prix','remise','sells','promote','disponible','quantity','summery','images','active','last_time_bought'
    ];
    
}
