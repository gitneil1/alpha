<?php

namespace App\models\maintenance;

use Illuminate\Database\Eloquent\Model;

class MaintenanceVendor extends Model
{
    //change 'id' to 'log'
    protected $primaryKey = 'log';

    //return array of vendor_ids
    public static function returnAllVendorIds(){
    	//array that will hold all id
    	$ids_arr = array();
    	//return array of vendor_id
    	$types = self::all();
    	foreach ($types as $key => $value) {
    		array_push($ids_arr, $value['vendor_id']);
    	}
    	return $ids_arr;
    }

    //return array of logs
    public static function returnAllLogs(){
    	//array that will hold all id
    	$ids_arr = array();
    	//return array of log
    	$types = self::all();
    	foreach ($types as $key => $value) {
    		array_push($ids_arr, $value['log']);
    	}
    	return $ids_arr;
    }

    //return array of 'id' as key and $combined_string as value
    public static function returnLogsAndValues(){
    	$combined_array = array_combine(self::returnAllLogs(), self::returnAllVendorIds());
    	return $combined_array;
    }
}
