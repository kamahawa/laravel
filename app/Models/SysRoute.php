<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class SysRoute extends Model
{
    public function insert($data)
    {
        $result = DB::table('sys_routes')->insert($data);

        if ($result > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function selectAllRoute(){
        $result = DB::table('sys_routes')
            ->where('Delete',0)
            ->orderBy('RouteID','asc')
            ->get();
        return $result;
    }
    
    public function updateSysRoute($id,$data)
    {
        $result = DB::table('sys_routes')
            ->where('RouteID', $id)
            ->update($data);
        if ($result > 0)
            return TRUE;
        else
            return FALSE;
    }
    
    public function deleteSysRoute($id)
    {
        $result = DB::table('sys_routes')
            ->where('RouteID', $id)
            ->delete();
        if ($result > 0)
            return TRUE;
        else
            return FALSE;
    }
    
    public function selectSysRouteByRouteId($id)
    {
        $results = DB::table('sys_routes')
            ->select('sys_routes.*')
            ->where('sys_routes.RouteID', '=', $id)
            ->first();
        return $results;
    }
    
    public function selectAllRouteId()
    {
        $results = DB::table('sys_routes')
            ->select('sys_routes.RouteID')
            ->where('sys_routes.Delete', '=', 0)
            ->get();
        return $results;
    }
    
    public function routeMap()
    {
        $results = DB::table('sys_routes')
            ->join('act_routepoints', 'sys_routes.RouteID', '=', 'act_routepoints.RouteID')
            ->select('sys_routes.RouteID,sys_routes.RouteName')
            ->where('sys_routes.Delete', '=', 0)
            ->get();
        return $results;
    }

    public function selectRouteIdAndRouteName(){
        $result = DB::table('sys_routes')
            ->select('RouteID','RouteName')
            ->where('Delete',0)
            ->get();
        return $result;
    }
}
