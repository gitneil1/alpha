<?php

namespace App\Models\Maintenance;

use Illuminate\Database\Eloquent\Model;

class MaintenanceInventoryItem extends Model
{
    //change 'id' to 'log'
    protected $primaryKey = 'log';

    public function chart_of_account(){
    	return $this->belongsTo('App\Models\Maintenance\MaintenanceChartOfAccount');
    }

    //return array of inventory_item_id
    public static function returnAllInventoryIds(){
    	//array that will hold all inventory_item_id
    	$type_arr = array();
    	//return array of MaintenanceChartOfAccountType
    	$types = self::all();
    	foreach ($types as $key => $value) {
    		array_push($type_arr, $value['inventory_item_id']);
    	}
    	return $type_arr;
    }

    //return array of types
    public static function returnAllItemClasses(){
    	//array that will hold all inventory_item_class
    	$types_arr = array();
    	//return array of this class
    	$types = self::all();
    	foreach ($types as $key => $value) {
    		array_push($types_arr, $value['inventory_item_class']);
    	}
    	return $types_arr;
    }

    public static function combineIdsAndClasses(){
    	$types = self::returnAllInventoryIds();
    	$type_names = self::returnAllItemClasses();
    	$combined_string = array();

    	$count = count($types) - 1;
    	for($i = 0; $i <= $count ; $i++){
    		$combined_string[$i] = $types[$i] . ' - ' . $type_names[$i];
    	}
    	return $combined_string;
    }

    //return array of ids
    public static function returnAllIds(){
    	//array that will hold all id
    	$ids_arr = array();
    	//return array of MaintenanceChartOfAccountType
    	$types = self::all();
    	foreach ($types as $key => $value) {
    		array_push($ids_arr, $value['log']);
    	}
    	return $ids_arr;
    }

    //return array of 'id' as key and $combined_string as value
    public static function returnIdsAndValues(){
    	$combined_array = array_combine(self::returnAllIds(), self::combineIdsAndClasses());
    	return $combined_array;
    }
}
