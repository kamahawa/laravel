<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ActRoutepoint extends Model
{
    public function insertData($data1,$data2){
        $result = DB::table('act_routepoints')->insert($data1);

        if ($result > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function deleteInActRoutePoint($id,$dataDelete){
        $result = DB::table('act_routepoints')
            ->where('RouteID',$id)
            ->update($dataDelete);

        if ($result > 0)
            return TRUE;
        else
            return FALSE;
    }


    public function getIdInActRoutePoint($id){
        $result = DB::table('act_routepoints')
            ->where('RouteID',$id)
            ->get();
        return $result;
    }
}
