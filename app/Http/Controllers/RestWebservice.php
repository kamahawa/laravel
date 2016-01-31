<?php

namespace App\Http\Controllers;

use App\Models\ActUser;
use App\Models\ActVehicle;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class RestWebservice extends Controller
{
    public function login($user,$pass){
        //http://192.168.100.68/laravel-master/api/RestWebservice/login/username/admin/password/21232f297a57a5a743894a0e4a801fc3
        $login = new ActUser();
        $result = $login->getUser($user,$pass);
        if(count($result)>0)
        {
            return json_encode(array(
                        'status'=> true,
                        'message'=>'login Success'
                    ));
        }
        else
        {
            return json_encode(array(
                    'status'=> false,
                    'message'=>'login Fail'
                ));
        }
    }

    public function get_bus_id($user,$pass){
        $actUser = new ActUser();
        $actVehicle = new ActVehicle();
        
    }
}