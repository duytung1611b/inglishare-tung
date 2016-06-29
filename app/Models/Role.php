<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['id','name'];
    public $timestamps = true;

    // Tạo quan hệ với bảng users
    public function user(){
    	return $this->hasMany('App\Models\User','roleId');
    }
}
