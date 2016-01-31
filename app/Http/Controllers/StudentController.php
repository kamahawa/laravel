<?php

namespace App\Http\Controllers;

use App\Models\ActStudent;
use App\Models\SysGroup;
use App\Models\SysRoute;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index()
    {

    }

    public function homePage(){
        $query = new ActStudent();
        $group = new SysGroup();
        $routeid = new SysRoute();
        return view("student.studentHomepage")->with([
            'student' => $query->selectAllStudent(),
            'group' => $group->selectGroupForStudent(),
            'routeid' => $routeid->selectRouteIdAndRouteName()
        ]);
    }

    public function insertData(Request $request){
        $post= $request->all();
        $query = new ActStudent();
        $result = $query->selectStudentID();
        $max = max($result);

        $date = date('Ymd');
        $array= json_decode(json_encode($max), true);
        $a = substr($array['StudentID'],8);
        $b = $a+1;
        $c = "$b";
        if(0<=$b && $b<=9)
        {
            $final = $date."000".$c;
        }else if(10<=$b && $b<=99)
        {
            $final = $date."00".$c;
        }else if(100<=$b && $b<=999)
        {
            $final = $date."0".$c;
        }else{
            $final = $date.$c;
        }
        if(count($result)>0) {
            $data = array(
                'StudentID'=>$final,
                'StudentName'=>$post['txtStudentName'],
                'StudentNameKana'=>$post['txtStudentNameKana'],
                'GroupID'=>$_POST['groupid'],
                'RouteID'=>$_POST['routeid'],
                'Address'=>$post['txtAddress'],
                'EmailGuard'=>$post['txtEmailGuard'],
                'PassWord'=>md5($post['txtPassword']),
                'Latitude'=>$post['txtLatitude'],
                'Longitude'=>$post['txtLongitude'],
                'Delete'=>0
            );
        }else {
            $data = array(
                'StudentID'=>$date."0000",
                'StudentName'=>$post['txtStudentName'],
                'StudentNameKana'=>$post['txtStudentNameKana'],
                'GroupID'=>$_POST['groupid'],
                'RouteID'=>$_POST['routeid'],
                'Address'=>$post['txtAddress'],
                'EmailGuard'=>$post['txtEmailGuard'],
                'PassWord'=>md5($post['txtPassword']),
                'Latitude'=>$post['txtLatitude'],
                'Longitude'=>$post['txtLongitude'],
                'Delete'=>0
            );
        }
        if($post['txtStudentName']!=null)
        {
            $query->insert($data);
        }
        return redirect('student');
    }

    public function showUpdatePage($id){
        $query = new ActStudent();
        $group = new SysGroup();
        $routeid = new SysRoute();
        return view('student.studentUpdate')->with([
            'student' => $query->getStudentById($id),
            'group' => $group->selectGroupForStudent(),
            'routeid' => $routeid->selectRouteIdAndRouteName()
        ]);
    }

    public function updateData(Request $request){
        $post= $request->all();
        $query = new ActStudent();
        $result = $query->selectStudent($post['id']);
        $array= json_decode(json_encode($result), true);
        if($post['txtPassword']==$array['PassWord'])
        {
            $data = array(
                'StudentName'=>$post['txtStudentName'],
                'StudentNameKana'=>$post['txtStudentNameKana'],
                'GroupID'=>$_POST['groupid'],
                'RouteID'=>$_POST['routeid'],
                'Address'=>$post['txtAddress'],
                'EmailGuard'=>$post['txtEmailGuard'],
                'PassWord'=>$post['txtPassword'],
                'Latitude'=>$post['txtLatitude'],
                'Longitude'=>$post['txtLongitude']
            );
        }else {
            $data = array(
                'StudentName' => $post['txtStudentName'],
                'StudentNameKana' => $post['txtStudentNameKana'],
                'GroupID' => $_POST['groupid'],
                'RouteID' => $_POST['routeid'],
                'Address' => $post['txtAddress'],
                'EmailGuard' => $post['txtEmailGuard'],
                'PassWord' => md5($post['txtPassword']),
                'Latitude' => $post['txtLatitude'],
                'Longitude' => $post['txtLongitude']
            );
        }
        $query->updateStudent($post['id'],$data);
        return redirect("student");
    }

    public function deleteData($id){
        $query = new ActStudent();
        $data = Array(
            'Delete'=>1,
        );
        $query->updateStudent($id,$data);
        return redirect("student");
    }
}
