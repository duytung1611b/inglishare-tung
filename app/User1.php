<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User1 extends Model
{
   protected $table = 'users';
   protected $fillable = [];
   public $timestamp = false;
   static $ID = 'id';
}
