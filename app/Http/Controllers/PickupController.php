<?php

namespace App\Http\Controllers;

use App\Models\ActConfirmpickup;
use App\Models\ActStudent;
use App\Models\ActUser;
use App\Models\ActVehicle;
use App\Models\SysPoint;
use App\Models\SysRoute;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PickupController extends Controller
{
    public function index()
    {

    }

    public function homePage(){
        $student = new ActStudent();
        return view("pickup.pickupHomepage")->with([
            'student' => $student->selectAllStudent()
        ]);
    }

    public function insertConfirmPickup(Request $request){
        $post=$request->all();
        $student = new ActStudent();
        $confirm = new ActConfirmpickup();
        $stu = $student->selectAllStudent();
        $array= json_decode(json_encode($stu), true);
        //echo '<pre>';
        //print_r($en);
        $date= date('Ymd');
        $count = 0;
        foreach($array as $a){
            $count = $count+1;
            $check = $confirm->getConfirmIDByID($a['StudentID']);
            if(count($check)>0)
            {
                if(isset($_POST["".$a['StudentID'].""]) && empty($_POST["".$a['StudentID'].$count.""]))
                {
                    $data = array(
                        'ConfirmPickupID'=> $date,
                        'StudentID'=>$a['StudentID'],
                        'GroupID'=>$a['GroupID'],
                        'PickUp'=>0,
                        'TakeHome'=>1,
                        'ConfirmPickupDate'=>$date,
                        'Delete'=>0
                    );
                    $confirm->updateData($a['StudentID'],$data);
                }
                elseif(empty($_POST["".$a['StudentID'].""]) && isset($_POST["".$a['StudentID'].$count.""]))
                {
                    $data = array(
                        'ConfirmPickupID'=> $date,
                        'StudentID'=>$a['StudentID'],
                        'GroupID'=>$a['GroupID'],
                        'PickUp'=>1,
                        'TakeHome'=>0,
                        'ConfirmPickupDate'=>$date,
                        'Delete'=>0
                    );
                    $confirm->updateData($a['StudentID'],$data);
                }
                elseif(empty($_POST["".$a['StudentID'].""]) && empty($_POST["".$a['StudentID'].$count.""]))
                {
                    $data = array(
                        'ConfirmPickupID'=> $date,
                        'StudentID'=>$a['StudentID'],
                        'GroupID'=>$a['GroupID'],
                        'PickUp'=>1,
                        'TakeHome'=>1,
                        'ConfirmPickupDate'=>$date,
                        'Delete'=>0
                    );
                    $confirm->updateData($a['StudentID'],$data);
                }
                else
                {
                    $confirm->deleteData($a['StudentID']);
                }
            }
            else
            {
                if(isset($_POST["".$a['StudentID'].""]) && empty($_POST["".$a['StudentID'].$count.""]))
                {
                    $data = array(
                        'ConfirmPickupID'=> $date,
                        'StudentID'=>$a['StudentID'],
                        'GroupID'=>$a['GroupID'],
                        'PickUp'=>0,
                        'TakeHome'=>1,
                        'ConfirmPickupDate'=>$date,
                        'Delete'=>0
                    );
                    $confirm->insert($data);
                }
                elseif(empty($_POST["".$a['StudentID'].""]) && isset($_POST["".$a['StudentID'].$count.""]))
                {
                    $data = array(
                        'ConfirmPickupID'=> $date,
                        'StudentID'=>$a['StudentID'],
                        'GroupID'=>$a['GroupID'],
                        'PickUp'=>1,
                        'TakeHome'=>0,
                        'ConfirmPickupDate'=>$date,
                        'Delete'=>0
                    );
                    $confirm->insert($data);
                }
                elseif(empty($_POST["".$a['StudentID'].""]) && empty($_POST["".$a['StudentID'].$count.""]))
                {
                    $data = array(
                        'ConfirmPickupID'=> $date,
                        'StudentID'=>$a['StudentID'],
                        'GroupID'=>$a['GroupID'],
                        'PickUp'=>1,
                        'TakeHome'=>1,
                        'ConfirmPickupDate'=>$date,
                        'Delete'=>0
                    );
                    $confirm->insert($data);
                }
            }
        }
        return view("pickup.pickupHomepage")->with([
            'student' => $confirm->selectStudentAndConfirmPickup()
        ]);
    }

    public function viewMapPickUp(){
        $pickup = new ActConfirmpickup();
        return view('pickup.viewMap')->with([
            'list'=> $pickup->selectPickupToViewMap()
        ]);
    }
    public function viewMapTakeHome(){
        $pickup = new ActConfirmpickup();
        return view('pickup.viewMap')->with([
            'list'=> $pickup->selectTakehomeToViewMap()
        ]);
    }
}
