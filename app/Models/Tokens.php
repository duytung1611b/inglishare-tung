<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tokens extends Model
{

    protected $table = 'tokens';
    protected $fillable = [];
    public $timestamps = true;

    // Tạo quan hệ với bảng users
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
