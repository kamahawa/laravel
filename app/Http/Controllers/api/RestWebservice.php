<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RouteController extends Controller
{
    public function login_get($user,$pass){
        if($user="test" && $pass="test"){
            return "Api";
        }

    }
}