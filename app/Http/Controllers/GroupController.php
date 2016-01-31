<?php

namespace App\Http\Controllers;

use App\Models\SysGroup;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    public function index()
    {

    }

    public function homePage(){
        $query = new SysGroup();
        return view("group.groupHomepage")->with([
            'group' => $query->selectAllSysGroup(),
        ]);
    }

    public function insertData(Request $request){
        $post= $request->all();
        $query = new SysGroup();
        $result = $query->selectSysGroupId();
        $max = max($result);
        $array= json_decode(json_encode($max), true);
        $currentGroupID= $array['GroupID']+1;
        $date = date('Y/m/d H:i:s');
        if(count($result)>0) {
            $data = array(
                'GroupID'=> $currentGroupID ,
                'GroupName'=> $post['txtGroupName'],
                "GroupNameKana"=> $post['txtGroupNameKana'],
                "CreateDate"=>  $date,
                "Delete"=>  0
            );
        }else {
            $data = array(
                'GroupID'=> 0 ,
                'GroupName'=> $post['txtGroupName'],
                "GroupNameKana"=> $post['txtGroupNameKana'],
                "CreateDate"=>  $date,
                "Delete"=>  0
            );
        }
        if($post['txtGroupName'] != null)
        {
            $query->insert($data);
        }
        return redirect('group');
    }

    public function showUpdatePage($id){
        $query = new SysGroup();
        return view('group.groupUpdate')->with([
            'row' => $query->selectSysGroupById($id),
        ]);
    }

    public function updateData(Request $request){
        $post= $request->all();
        $query = new SysGroup();
        $date = date('Y/m/d H:i:s');
        $data = array(
            'GroupName'=> $post['txtGroupName'],
            "GroupNameKana"=> $post['txtGroupNameKana'],
            "UpdateDate"=>  $date,
        );
        $query->updateSysGroup($post['id'],$data);
        return redirect("group");
    }

    public function deleteData($id){
        $query = new SysGroup();
        $data = Array(
            'Delete'=>1,
        );
        $query->updateSysGroup($id,$data);
        return redirect("group");
    }
}
