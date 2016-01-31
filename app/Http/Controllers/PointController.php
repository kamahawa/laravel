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

class PointController extends Controller
{
    public function index()
    {

    }

    public function homePage(){
        $query = new SysPoint();
        return view("point.pointHomepage")->with([
            'point' => $query->selectall(),
        ]);
    }

    public function insertData(Request $request){
        $post= $request->all();
        $query = new SysPoint();
        $result = $query->selectPointID();
        $max = max($result);
        $array= json_decode(json_encode($max), true);
        $currentPointID= $array['PointID']+1;
        $date = date('Y/m/d H:i:s');
        if(count($result)>0) {
            $data = array(
                'PointID'=> $currentPointID ,
                'PointName'=> $post['txtPointName'],
                "PointNameKana"=> $post['txtPointNameKana'],
                "CreateDate"=>  $date,
                "Delete"=>  0
            );
        }else {
            $data = array(
                'PointID'=> 0 ,
                'PointName'=> $post['txtPointName'],
                "PointNameKana"=> $post['txtPointNameKana'],
                "CreateDate"=>  $date,
                "Delete"=>  0
            );
        }
        if($post['txtPointName'] != null)
        {
            $query->insert($data);
        }
        return redirect('point');
    }

    public function showUpdatePage($id){
        $query = new SysPoint();
        return view('point.PointUpdate')->with([
            'row' => $query->selectAllById($id),
        ]);
    }

    public function updateData(Request $request){
        $post= $request->all();
        $query = new SysPoint();
        $date = date('Y/m/d H:i:s');
        $data = array(
            'PointName'=> $post['txtPointName'],
            "PointNameKana"=> $post['txtPointNameKana'],
            "UpdateDate"=>  $date,
        );
        $query->updateData($post['id'],$data);
        return redirect("point");
    }

    public function deleteData($id){
        $query = new SysPoint();
        $data = Array(
            'Delete'=>1,
        );
        $query->updateData($id,$data);
        return redirect("point");
    }
}
