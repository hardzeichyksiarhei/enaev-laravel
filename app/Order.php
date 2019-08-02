<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $fillable = [ 'name', 'email', 'contact', 'caption', 'message' ];
}
