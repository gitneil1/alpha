<?php

namespace App\Models\Maintenance;

use Illuminate\Database\Eloquent\Model;
use App\Models\Maintenance\MaintenanceChartOfAccountType;

class MaintenanceChartOfAccount extends Model
{
    public function type(){
    	return $this->belongsTo('App\Models\Maintenance\MaintenanceChartOfAccountType', 'account_type');
    }

    public function inventory(){
    	return $this->hasMany('App\Models\Maintenance\MaintenanceInventory', 'gl_inventory_account');
    }

    public function sales(){
    	return $this->hasMany('App\Models\Maintenance\MaintenanceInventory', 'gl_sales_account');
    }

    //public function gl_inventory_account(){
    	//return $this->hasMany('App\Models\Maintenance\MaintenanceInventory', 'gl_inventory_account');
    //}

    //return array of account_type
    public static function returnAllTypes(){
    	//array that will hold all account_type_names
    	$type_arr = array();
    	//return array of MaintenanceChartOfAccountType
    	$types = self::all();
    	foreach ($types as $key => $value) {
    		array_push($type_arr, $value['account_type']);
    	}
    	return $type_arr;
    }

    //return array of ids
    public static function returnAllIds(){
    	//array that will hold all id
    	$ids_arr = array();
    	//return array of MaintenanceChartOfAccountType
    	$types = self::all();
    	foreach ($types as $key => $value) {
    		array_push($ids_arr, $value['id']);
    	}
    	return $ids_arr;
    }

    //return array of types
    public static function returnAllDescriptions(){
    	//array that will hold all account_type
    	$types_arr = array();
    	//return array of MaintenanceChartOfAccountType
    	$types = self::all();
    	foreach ($types as $key => $value) {
    		array_push($types_arr, $value['account_description']);
    	}
    	return $types_arr;
    }

    public static function combineTypeAndDescriptions(){
    	$types = self::returnAllTypes();
    	$type_names = self::returnAllDescriptions();
    	$combined_string = array();

    	$count = count($types) - 1;
    	for($i = 0; $i <= $count ; $i++){
    		$combined_string[$i] = $types[$i] . ' - ' . $type_names[$i];
    	}
    	return $combined_string;
    }

    //return array of 'id' as key and $combined_string as value
    public static function returnIdsAndValues(){
    	$combined_array = array_combine(self::returnAllIds(), self::combineTypeAndDescriptions());
    	return $combined_array;
    }
}
