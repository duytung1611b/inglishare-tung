<?php
namespace App\Services\Inf;
interface  UserServicesInf{
	public function  getUsers();

   static function getAll();
    static function autoReloadAPI();
}