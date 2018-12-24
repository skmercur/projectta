<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemsBought extends Model
{
protected $fillable = ['id_buyer','code_product','image_ccp','code_commentaire','status',];

}
