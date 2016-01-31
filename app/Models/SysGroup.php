<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class SysGroup extends Model
{
    public function insert($data)
    {
        $result = DB::table('sys_groups')->insert($data);

        if ($result > 0)
            return TRUE;
        else
            return FALSE;
    }
    
    public function selectAllSysGroup()
    {
        $results = DB::table('sys_groups')
            ->where('delete',0)
            ->orderBy('GroupID','asc')
            ->get();
        return $results;
    }

    public function updateSysGroup($id,$data)
    {
        $result = DB::table('sys_groups')
            ->where("GroupID",$id)
            ->update($data);

        if ($result > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function deleteSysGroup($id)
    {
        $result = DB::table('ConfirmPickupID')
            ->where("GroupID",$id)
            ->delete();

        if ($result > 0)
            return TRUE;
        else
            return FALSE;
    }
    
    public function selectSysGroupById($id)
    {
        $results = DB::table('sys_groups')
            ->select('sys_groups.*')
            ->where('sys_groups.GroupID', '=', $id)
            ->first();

        return $results;
    }

    public function selectSysGroupId()
    {
        $results = DB::table('sys_groups')
            ->select('GroupID')
            ->where('Delete',0)
            ->get();
        return $results;
    }

    public function selectGroupForStudent(){
        $result = DB::table('sys_groups')
            ->select('GroupID','GroupName')
            ->where('Delete',0)
            ->get();
        return $result;
    }
}
