<?php

namespace App\Http\Controllers;

use App\Models\ActUser;
use App\Models\ActVehicle;
use App\Models\SysPoint;
use App\Models\SysRoute;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RouteController extends Controller
{
    public function index()
    {

    }

    public function homePage(){
        $query = new SysRoute();
        return view("route.routeHomepage")->with([
            'route' => $query->selectAllRoute(),
        ]);
    }

    public function insertData(Request $request){
        $post= $request->all();
        $query = new SysRoute();
        $result = $query->selectAllRouteId();
        $max = max($result);
        $array= json_decode(json_encode($max), true);
        $currentRouteID= $array['RouteID']+1;
        $date = date('Y/m/d H:i:s');
        if(count($result)>0) {
            $data = array(
                'RouteID'=> $currentRouteID ,
                'RouteName'=> $post['txtRouteName'],
                "RouteNameKana"=> $post['txtRouteNameKana'],
                "CreateDate"=>  $date,
                "Delete"=>  0
            );
        }else {
            $data = array(
                'RouteID'=> 0 ,
                'RouteName'=> $post['txtRouteName'],
                "RouteNameKana"=> $post['txtRouteNameKana'],
                "CreateDate"=>  $date,
                "Delete"=>  0
            );
        }
        if($post['txtRouteName'] != null)
        {
            $query->insert($data);
        }
        return redirect('route');
    }

    public function showUpdatePage($id){
        $query = new SysRoute();
        return view('route.routeUpdate')->with([
            'row' => $query->selectSysRouteByRouteId($id),
        ]);
    }

    public function updateData(Request $request){
        $post= $request->all();
        $query = new SysRoute();
        $date = date('Y/m/d H:i:s');
        $data = array(
            'RouteName'=> $post['txtRouteName'],
            "RouteNameKana"=> $post['txtRouteNameKana'],
            "UpdateDate"=>  $date,
        );
        $query->updateSysRoute($post['id'],$data);
        return redirect("route");
    }

    public function deleteData($id){
        $query = new SysRoute();
        $data = Array(
            'Delete'=>1,
        );
        $query->updateSysRoute($id,$data);
        return redirect("route");
    }
}
