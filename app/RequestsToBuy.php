<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestsToBuy extends Model
{
   protected $fillable = ['id_facebook','codeRequest','productCode','status','methode'];
  
}
