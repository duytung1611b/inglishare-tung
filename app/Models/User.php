<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{

     protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */



    public static $UserInfoFields = ['email','firstName','lastName','api_token','roleId'];



    public $timestamps = false;

    // Tao quan hệ 1-n với bảng roles
    public function role(){
        return $this->belongsTo('App\Models\Role','roleId');
    }
    //check
    public function is($roleName)
    {

        if ($this->role()->get()->first()->name == $roleName)
        {
            return true;
        }

        return false;
    }

}

class UserInfo{

}
