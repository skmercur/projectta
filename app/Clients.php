<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $fillable = ['name','phone','email','id_facebook','photo','location','distance',];
   
}
