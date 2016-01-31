<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class ActUser extends Authenticatable
{

    protected $table = 'act_users';
    public $timestamps = false;
    public $primaryKey = 'UserID';


    public function insert($data)
    {
        $result = DB::table('act_users')->insert($data);

        if ($result > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function selectAllUser()
    {
        $results = DB::table('act_users')
            ->where('Deleted',0)
            ->orderBy('UserID','asc')
            ->get();
        return $results;
    }

    public function deleteUser($id)
    {
        $result = DB::table('act_users')
            ->where('UserID', $id)
            ->delete();
        if ($result > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function selectUserById($id)
    {
        $results = DB::table('act_users')
            ->select('act_users.*')
            ->where('act_users.UserID', '=', $id)
            ->where('act_users.Deleted', '=', 0)
            ->first();
        return $results;

    }

    public function updateUser($id,$data)
    {
        $result = DB::table('act_users')
            ->where('UserID', $id)
            ->update($data);
        if ($result > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function selectUserId()
    {
        $results = DB::select('SELECT UserID FROM act_users as u WHERE u.Deleted = 0');
        return $results;
    }


    function getUser($usr, $pwd){
        $result = DB::table('act_users')
            ->where('UserName',$usr)
            ->where('UserEncryptedPassword',$pwd)
            ->get();
        return $result;
    }

    function getUserBus($usr, $pwd){                    //getUserBus == getDriverIdBus
        $result = DB::table('act_users')
            ->where('UserName',$usr)
            ->where('UserEncryptedPassword',$pwd)
            ->get();

        if(count($result)>0){
            return $result[0]->UserID;
        }
        return 0;
    }

    function getUserManageid($usr, $pwd)
    {
        $result = DB::table('act_users')
            ->select('ManageId')
            ->where('UserName',$usr)
            ->where('UserEncryptedPassword',$pwd)
            ->get();

        if(count($result)>0){
            return $result[0]->ManageId;
        }
        return -1;
    }

    public function selectDriverifForVehicle(){
        $result = DB::table('act_users')
            ->select('UserID','UserName')
            ->where('Deleted',0)
            ->get();
        return $result;
    }
}