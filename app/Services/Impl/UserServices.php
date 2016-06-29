<?php
namespace App\Services\Impl;


use App\Services\Inf\UserServicesInf;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class  UserServices implements UserServicesInf{
	public function  getUsers(){
		return User::get(); 
	}
	public function getU(){
		$user = User::select('email')->get()->toArray();
		return $user;
    }
    static  function getAll()
            {

               return User::get();



            }

    static function autoReloadAPI()
    {
//        if (Auth::check()) {
//            $apiToken=User::first()->api_token;
//
//            if ($apiToken!=$newAPIToken) {
//                $user = new User();
//                $user->api_token= $newAPIToken;
//            }
//        }
  }
}