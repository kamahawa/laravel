<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;

class ActStudent extends Model
{
    public function selectAllStudent()
    {
        $results = DB::table('act_students')
            ->where('Delete',0)
            ->orderBy('StudentID','asc')
            ->get();
        return $results;
    }

    public function insert($data)
    {
        $result = DB::table('act_students')->insert($data);

        if ($result > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function selectStudent($id)
    {
        $result = DB::table('act_students')
            ->where('Delete',0)
            ->where("StudentID",$id)
            ->first();
        return $result;
    }

    public function getStudentById($id)
    {
        $results = DB::table("act_students")
            ->where('Delete',0)
            ->where('StudentID',$id)
            ->first();
        return $results;
    }

    public function updateStudent($id,$data)
    {
        //update information student
        $result = DB::table('act_students')
            ->where("StudentID",$id)
            ->update($data);

        if ($result > 0)
            return TRUE;
        else
            return FALSE;
    }
    /*
    public function deleteLocation($id)
    {
        //ex : DB::table('users')->where('votes', '<', 100)->delete();
        DB::table('act_students')
            ->where("StudentID",$id)
            ->delete();
    }

    public function selectAllStudentId()
    {
        $results = DB::select("SELECT st.StudentID FROM act_students as st");
        return $results;
    }

    public  function selectroute()
    {
        $this->load->database();
        $this->db->select("*");
        $this->db->where("Delete",0);
        $query=$this->db->get('sys_routes');
        return $query->result_array();
    }

    public  function selectgroup()
    {
        $this->load->database();
        $this->db->select("*");
        $this->db->where("Delete",0);
        $query=$this->db->get('sys_groups');
        return $query->result_array();
    }
    */

    //old method selectall
    public  function selectAllInfo()
    {
        $results = DB::table('act_students')
            ->join('sys_groups', 'act_students.GroupID', '=', 'sys_groups.GroupID')
            ->join('sys_routes', 'act_students.RouteID', '=', 'sys_routes.RouteID')
            ->select('act_students.StudentID', 'act_students.StudentName', 'act_students.StudentNameKana',
                'act_students.RouteID', 'sys_routes.RouteID', 'sys_routes.RouteName', 'sys_groups.GroupID',
                'sys_groups.GroupName', 'act_students.Latitude', 'act_students.Longitude', 'act_students.Address', 'act_students.EmailGuard')
            ->get();
        return $results;
    }

    //old method selectall
    public  function selectStudentRouteByBusId($busId)
    {
        $results = DB::table('act_students')
            ->join('act_confirmpickups', 'act_students.StudentID', '=', 'act_confirmpickups.StudentID')
            ->join('act_vehicles', 'act_students.RouteID', '=', 'act_vehicles.RouteID')
            ->select('act_students.StudentID', 'act_students.StudentName', 'act_students.StudentNameKana', 'act_students.GroupID',
                'act_students.RouteID', 'act_students.Address','act_students.Latitude', 'act_students.Longitude', 'act_students.ZoomLevel',
                'act_students.EmailGuard', 'act_students.CreateUser', 'act_students.CreateDate', 'act_students.UpdateDate', 'act_students.Status',
                'act_students.Delete', 'act_students.hide')
            ->where('act_students.Delete', '=', 0)
            ->where('act_vehicles.BusID', '=', $busId)
            ->where('act_confirmpickups.PickUp', '=', 0)
            ->get();
        return $results;
    }

    //old method getemail
    public function selectEmail()
    {
        $results = DB::select('SELECT EmailGuard FROM act_students as st WHERE st.Delete = 0');
        return $results;
    }

    public function selectStudentByRouteIdSession()
    {
        $results = DB::table('act_students')
            ->select('act_students.StudentID', 'act_students.StudentName', 'act_students.Latitude', 'act_students.Longitude')
            ->where('act_students.Delete', '=', 0)
            ->where('act_students.RouteID', '=',$_SESSION['getid'])
            ->groupBy('act_students.StudentID')
            ->get();
        return $results;
    }

    public function selectStudentByRouteID($id){
        $result = DB::table('act_students')
            ->where('Delete',0)
            ->where('RouteID',$id)
            ->get();
        return $result;
    }

    public function selectRoute(){
        $result = DB::table('act_students')
            ->select('act_students.StudentID','act_students.StudentName','act_students.RouteID','act_students.Latitude','act_students.Longitude')
            ->where('act_students.Delete','=',0)
            ->where('act_students.RouteID','=',$POST['selectrouteid'])
            ->get();
        return $result;
    }

    function checkEmailLogin($usr, $pwd){
        $result = DB::table('act_students')
            ->select('StudentID')
            ->where('EmailGuard',$usr)
            ->where('PassWord',$pwd)
            ->get();
        if(count($result)>0){
            return $result[0]->StudentID;
        }
        return 1;
    }

    function getAllStudentByEmail($id){                //get_all_student($id)
        $result = DB::table('act_students')
            ->where('EmailGuard',$id)
            ->get();
        return $result;
    }

    function getAllConfirm($id){
        $result = DB::table('act_students')
            ->where('StudentID',$id)
            ->get();
        return $result;
    }
    public function selectStudentID(){
        $result = DB::table('act_students')
            ->select('StudentID')
            ->where('Delete',0)
            ->get();
        return $result;
    }
}