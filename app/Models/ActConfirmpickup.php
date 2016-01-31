<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ActConfirmpickup extends Model
{

    public function insert($data)
    {
        $result = DB::table('act_confirmpickups')->insert($data);

        if ($result > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function updateData($id,$data){
        $result = DB::table('act_confirmpickups')
            ->where('StudentID',$id)
            ->where('ConfirmPickupID',date('Ymd'))
            ->update($data);
        if ($result > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function deleteData($id)
    {
        $result = DB::table('act_confirmpickups')
            ->where("StudentID",$id)
            ->where("ConfirmPickupID",date('Ymd'))
            ->delete();

        if ($result > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function getPickUpByID($id){
        $result = DB::table('act_confirmpickups')
            ->select('PickUp')
            ->where('StudentID',$id)
            ->where("ConfirmPickupID",date('Ymd'))
            ->first();
        return $result;
    }

    public function selectPickupToViewMap(){
        $result = DB::table('act_confirmpickups')
            ->join('act_students','act_students.StudentID','=','act_confirmpickups.StudentID','right')
            ->select('act_students.StudentID','act_students.StudentName','act_confirmpickups.PickUp','act_students.Latitude', 'act_students.Longitude')
            ->where('act_students.Delete',0)
            ->where('act_confirmpickups.PickUp',0)
            ->orWhere('act_confirmpickups.PickUp',null)
            ->groupBy('act_students.StudentID')
            ->get();
        return $result;
    }

    public function selectTakehomeToViewMap(){
        $result = DB::table('act_confirmpickups')
            ->join('act_students','act_students.StudentID','=','act_confirmpickups.StudentID','right')
            ->select('act_students.StudentID','act_students.StudentName','act_confirmpickups.TakeHome','act_students.Latitude', 'act_students.Longitude')
            ->where('act_students.Delete',0)
            ->where('act_confirmpickups.TakeHome',0)
            ->orWhere('act_confirmpickups.TakeHome',null)
            ->groupBy('act_students.StudentID')
            ->get();
        return $result;
    }

    public function selectStudentAndConfirmPickup()
    {
        $result = DB::table('act_confirmpickups')
            ->join('act_students','act_students.StudentID','=','act_confirmpickups.StudentID','right')
            ->select('act_students.StudentID','act_students.StudentName','act_confirmpickups.PickUp','act_confirmpickups.TakeHome')
            ->where('act_students.Delete',0)
            ->groupBy('act_students.StudentID')
            ->get();
        return $result;
    }

    public  function selectPickup()
    {
        $results = DB::table('act_confirmpickups')
            ->leftJoin('act_students', 'act_students.StudentID', '=', 'act_confirmpickups.StudentID')
            ->select('act_students.StudentID', 'act_students.StudentName', 'act_students.Latitude', 'act_students.Longitude', 'act_confirmpickups.PickUp')
            ->where('act_students.Delete', '=', 0)
            ->where('act_confirmpickups.PickUp', '=', NULL)
            ->get();
        return $results;
    }

    public  function selectTakeHome()
    {
        $results = DB::table('act_confirmpickups')
            ->leftJoin('act_students', 'act_students.StudentID', '=', 'act_confirmpickups.StudentID')
            ->select('act_students.StudentID', 'act_students.StudentName', 'act_students.Latitude', 'act_students.Longitude', 'act_confirmpickups.TakeHome')
            ->where('act_students.Delete', '=', 0)
            ->where('act_confirmpickups.TakeHome', '=', NULL)
            ->get();
        return $results;
    }

    public function selectPickupByID($date,$studentId)
    {
        $results = DB::table('act_confirmpickups')
            ->select('act_confirmpickups.PickUp')
            ->where('act_confirmpickups.PickUp', '=', $date)
            ->where('act_confirmpickups.StudentID', '=', $studentId)
            ->get();
        return $results;
    }

    public function getPickup($studentId)                            //get_confirmpickup
    {
        $results = DB::table('act_confirmpickups')
            ->select('act_confirmpickups.PickUp')
            ->where('act_confirmpickups.ConfirmPickupID', '=', date('Ymd'))
            ->where('act_confirmpickups.StudentID', '=', $studentId)
            ->get();
        if(count($results) > 0)
        {
            return $results[0]->PickUp;
        }else{
            return 0;
        }

        return "";
    }

    public function getTakeHome($studentId)
    {
        $results = DB::table('act_confirmpickups')
            ->select('act_confirmpickups.TakeHome')
            ->where('act_confirmpickups.ConfirmPickupID', '=',date('Ymd') )
            ->where('act_confirmpickups.StudentID', '=', $studentId)
            ->get();
        if(count($results) > 0)
        {
            return $results[0]->TakeHome;
        }else{
            return 0;
        }

        return "";
    }

    function getConfirm($id){
        $result = DB::table('act_confirmpickups')
            ->where('ConfirmPickupID',$id)
            ->Where('ConfirmPickupDate',$_SESSION['date'])
            ->get();
        return $result;
    }

    function loginGetConfirm($id)
    {
        $date = date('%Y=%m-%d');
        $result = DB::table('act_confirmpickups')
            ->where('StudentID',$id)
            ->where('ConfirmPickupDate',$date)
            ->get();
        return $result;
    }

    function pickupTakehome($id)
    {
        $result = DB::table('act_confirmpickups')
            ->where('ConfirmPickupID',$id)
            ->get();
        if(count($result)>0){
            return $result[0]->StudentID;
        }
        return "";
    }

    public function getConfirmIDByID($id){
        $result = DB::table('act_confirmpickups')
            ->select('StudentID')
            ->where('ConfirmPickupID',date('Ymd'))
            ->where('StudentID',$id)
            ->first();
        return $result;
    }
}
