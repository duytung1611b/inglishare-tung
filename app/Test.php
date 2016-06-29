<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'tests';
    protected $fillable = ['name', 'alias', 'oder', 'parent_id', 'keywords', 'description'];
    public $timestamp = false;
}
