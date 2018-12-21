<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name_product', 'id_categorie', 'prix','remise','sells','promote','disponible','quantity','summery','last_time_bought'
    ];
    
}
