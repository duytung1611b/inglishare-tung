<?php
namespace App\Services\Impl;


use App\Services\Inf\TestServicesInf;
use App\Models\User;
class  UserServices implements TestServicesInf{
	public function  getUsers(){
		return User::get(); 
	}
	public function getU(){
		$user = User::select('email')->get()->toArray();
		return $user;
	}
}