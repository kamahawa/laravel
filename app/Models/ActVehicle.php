<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ActVehicle extends Model
{
    public function selectAll()
    {
        $result = DB::table('act_vehicles')
            ->where('Delete',0)
            ->orderBy('BusID','asc')
            ->get();
        return $result;
    }

    public function insertData($data){
        $result = DB::table('act_vehicles')->insert($data);
        if ($result > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function updateAndDeleteData($id,$data){
        $result = DB::table('act_vehicles')
            ->where('BusID',$id)
            ->update($data);

        if ($result > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function getId($id){
        $result = DB::table('act_vehicles')
            ->where('BusID',$id)
            ->where('Delete',0)
            ->first();
        return $result;
    }

    public function selectBusID(){
        $result = DB::table('act_vehicles')
            ->select('BusID')
            ->get();

        return $result;
    }

    public function selectDriverID(){
        $result = DB::table('act_vehicles')
            ->select('DriverID')
            ->get();
        return $result;
    }

    public function getLocationBus($id){
        $result = DB::table('act_vehicles')
            ->select('Latitude','Longitude','BusName','Zoom')
            ->where('BusID',$id)
            ->get();
        return $result;
    }

    public function getBusIdByRouteId($id){
        $result = DB::table('act_vehicles')
            ->select('BusID')
            ->where('RouteID',$id)
            ->get();
        return $result;
    }

    function getLocation($id){
        $result = DB::table('act_vehicles')
            ->where('RouteID',$id)
            ->get();
        return $result;
    }
}
