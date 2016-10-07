<?php

namespace App\Models\Maintenance;

use Illuminate\Database\Eloquent\Model;

class MaintenanceCostCenter extends Model
{
    //return array of vendor_ids
    public static function returnAllCostCenterIds(){
    	//array that will hold all id
    	$ids_arr = array();
    	//return array of vendor_id
    	$types = self::all();
    	foreach ($types as $key => $value) {
    		array_push($ids_arr, $value['cost_center_id']);
    	}
    	return $ids_arr;
    }

    //return array of logs
    public static function returnAllIds(){
    	//array that will hold all id
    	$ids_arr = array();
    	//return array of log
    	$types = self::all();
    	foreach ($types as $key => $value) {
    		array_push($ids_arr, $value['id']);
    	}
    	return $ids_arr;
    }

    //return array of 'id' as key and $combined_string as value
    public static function returnLogsAndValues(){
    	$combined_array = array_combine(self::returnAllIds(), self::returnAllCostCenterIds());
    	return $combined_array;
    }
}
