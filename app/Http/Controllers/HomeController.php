<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Services\Service;

class HomeController extends Controller
{
    public function index(){
    	
    	return view('layouts/index');

    }
}
