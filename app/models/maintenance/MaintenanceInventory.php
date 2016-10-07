<?php

namespace App\Models\Maintenance;

use Illuminate\Database\Eloquent\Model;
use App\Models\Maintenance\MaintenanceChartOfAccount;

class MaintenanceInventory extends Model
{
    //change 'id' to 'log'
    protected $primaryKey = 'log';

    public function chart_of_account(){
    	return $this->hasOne(MaintenanceChartOfAccount::class, 'id');
    }

    //return array of vendor_ids
    public static function returnAllInventoryIds(){
    	//array that will hold all id
    	$ids_arr = array();
    	//return array of vendor_id
    	$types = self::all();
    	foreach ($types as $key => $value) {
    		array_push($ids_arr, $value['inventory_id']);
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
    	$combined_array = array_combine(self::returnAllLogs(), self::returnAllInventoryIds());
    	return $combined_array;
    }
}
