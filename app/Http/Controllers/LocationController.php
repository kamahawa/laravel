<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActStudent;
use App\Models\SysRoute;

class LocationController extends Controller{

    public function index(){

    }

    public function homePage(){
        $route = new SysRoute();
        $student = new ActStudent();
        $rs = $student->selectAllStudent();
        //echo '<pre>';
        //print_r($rs);
        return view('location.locationHomepage')->with([
            'route'=>$route->selectRouteIdAndRouteName(),
            'student'=>$student->selectAllStudent()
        ]);
    }

    public function showStudentByRoute(Request $request){
        $student = new ActStudent();
        $route = new SysRoute();
        return view('location.locationHomepage')->with([
            'route'=>$route->selectRouteIdAndRouteName(),
            'student' => $student->selectStudentByRouteID($_POST['selectrouteid'])
        ]);
    }
    public function viewMap(Request $request){
        $viewmap = array();
        if(isset($_POST['getlocation']))
        {
            $viewmap = explode("@", $_POST['getlocation']);
        }
        $abc = (object)$viewmap;
        return view('location.viewMap')->with([
            'viewmap'=>$abc
        ]);
    }
}