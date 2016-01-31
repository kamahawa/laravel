<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class SysPoint extends Model
{
    public function selectall(){
        $result = DB::table('sys_points')
            ->where('Delete',0)
            ->orderBy('PointID','asc')
            ->get();
        return $result;
    }

    public function selectPointID(){
        $result = DB::table('sys_points')
            ->select('PointID')
            ->where('Delete',0)
            ->get();
        return $result;
    }

    public function insert($data){
        $result = DB::table('sys_points')->insert($data);
        if ($result > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function selectAllById($id){
        $result = DB::table('sys_points')
            ->where('Delete',0)
            ->where('PointID',$id)
            ->first();
        return $result;
    }

    public function updateData($id,$dataupdate){
        $result = DB::table('sys_points')
            ->where('PointID',$id)
            ->update($dataupdate);
        if ($result > 0)
            return TRUE;
        else
            return FALSE;

    }
}