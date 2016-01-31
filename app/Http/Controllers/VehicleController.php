<?php

namespace App\Http\Controllers;

use App\Models\ActUser;
use App\Models\ActVehicle;
use App\Models\SysRoute;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class VehicleController extends Controller
{
    public function index()
    {

    }

    public function homePage(){
        $query = new ActVehicle();
        $driverId = new ActUser();
        $routeid = new SysRoute();
        return view("vehicle.vehicleHomepage")->with([
            'vehicle' => $query->selectAll(),
            'driverid' => $driverId->selectDriverifForVehicle(),
            'routeid' => $routeid->selectRouteIdAndRouteName()
        ]);
    }

    public function insertData(Request $request){
        $post= $request->all();
        $query = new ActVehicle();
        $result = $query->selectBusID();

        $max = max($result);
        $array= json_decode(json_encode($max), true);
        $currentBusID= $array['BusID']+1;
        $date = date('Y/m/d H:i:s');
        if(count($result)>0) {
            $data = array(
                'BusID'=> $currentBusID ,
                'BusName'=> $post['txtBusName'],
                "DriverID"=> $_POST['driverid'],
                "RouteID"=>  $_POST['routeid'],
                'Status'=> $post['txtStatus'],
                "CreateDate"=>  $date,
                "Delete"=>  0
            );
        }else {
            $data = array(
                'BusID' => 0,
                'BusName' => $post['txtBusName'],
                "DriverID"=> $_POST['driverid'],
                "RouteID"=>  $_POST['routeid'],
                'Status' => $post['txtStatus'],
                "CreateDate" => $date,
                "Delete" => 0
            );
        }
        if($post['txtBusName'] != null)
        {
            $query->insertData($data);
        }
        return redirect('vehicle');
    }

    public function showUpdatePage($id){
        $query = new ActVehicle();
        $driverId = new ActUser();
        $routeid = new SysRoute();
        return view('vehicle.vehicleUpdate')->with([
            'row' => $query->getId($id),
            'driverid' => $driverId->selectDriverifForVehicle(),
            'routeid' => $routeid->selectRouteIdAndRouteName()
        ]);
    }

    public function updateData(Request $request){
        $post= $request->all();
        $query = new ActVehicle();
        $date = date('Y/m/d H:i:s');
        $data = array(
            'BusName'=> $post['txtBusName'],
            "DriverID"=> $_POST['driverid'],
            "RouteID"=>  $_POST['routeid'],
            'Status'=> $post['txtStatus'],
            "UpdateDate"=>  $date,
        );
        $query->updateAndDeleteData($post['id'],$data);
        return redirect("vehicle");
    }

    public function deleteData($id){
        $query = new ActVehicle();
        $data = Array(
            'Delete'=>1,
        );
        $query->updateAndDeleteData($id,$data);
        return redirect("vehicle");
    }
}
