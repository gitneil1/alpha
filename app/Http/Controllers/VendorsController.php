<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Maintenance\MaintenanceVendorType;
use App\Models\Maintenance\MaintenanceVendor;
use App\Models\Maintenance\MaintenanceChartOfAccountType;

class VendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retrieve all records
        $vendors = MaintenanceVendor::all();
        //load the view with the array of data
        return view('pages.maintenance.vendor_accounts.vendors_index')
            ->with('vendors', $vendors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //======================
        //chart_of_accounts
        //get all account type records from DB. The retrieved data will populate the 
        //Account Type option
        $chart_of_account_types_arr = MaintenanceChartOfAccountType::all();
        $chart_of_account_types_keys = array();
        $chart_of_account_types_values = array();

        //get all unique id from MaintenanceChartOfAccountType. this id will be used as key
        $chart_of_account_type_ids = self::getAllIdsFromMaintenanceChartOfAccountType($chart_of_account_types_arr);

        //store account_type in an array that will be combined with keys
        for($i = 0; $i < count($chart_of_account_types_arr); $i++){
            $types_arr = explode(',', $chart_of_account_types_arr[$i]);
            //get the id
            $chart_of_account_types_keys[$i] = str_replace('"', '',substr($types_arr[1], 16));
        }
        
        //store value in an array.
        for($i = 0; $i < count($chart_of_account_types_arr); $i++){
            $types_arr = explode(',', $chart_of_account_types_arr[$i]);
            //add the account_id to the value of account type string
            $chart_of_account_types_values[$i] =  $chart_of_account_types_keys[$i] . ' - ';

            $chart_of_account_types_values[$i] .= str_replace('"', '', (substr($types_arr[2], 21)));
        }
        //echo "<br/>";
        
        //combine array of keys and values
        $chart_of_account_types0 = array_combine($chart_of_account_types_keys, $chart_of_account_types_values);

        //combine array of ids with array of keys and values
        $chart_of_account_types = array_combine($chart_of_account_type_ids, $chart_of_account_types0);
        //======================

        //get all account type records from DB. The retrieved data will populate the 
        //vendor Type option
        $vendor_types_arr = MaintenanceVendorType::all();//returns array of arrays
        //return an array of all unique ids from MaintenanceVendorType. this id will be used as key
        $vendor_type_ids = self::getAllIdsFromMaintenanceVendorType($vendor_types_arr);
        //store account_type in an array that will be combined with keys
        $vendor_types_codes = self::getAllCodesFromMaintenanceVendorType($vendor_types_arr);
        //combine array of ids with array of keys and values
        $vendor_types = array_combine($vendor_type_ids, $vendor_types_codes);

        return view('pages.maintenance.vendor_accounts.vendor_accounts_create')
            ->with('vendor_types', $vendor_types)
            ->with('chart_of_account_types', $chart_of_account_types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'vendor_id' => 'required',
            'vendor_name' => 'required',
            'account_number' => 'required',
            'expense_account' => 'required',
            'vendor_type_id' => 'required',
            'address_street' => 'required',
            'address_city' => 'required',
            'address_province' => 'required',
            'address_zip' => 'required',
            'address_country' => 'required',
            'contact_mobile' => 'required',
            'contact_landline' => 'required',
            'contact_email' => 'required',
            'contact_fax' => 'required',
            'contact_person' => 'required',
            'contact_role' => 'required',
            'status' => 'required'
        );

        $validator = \Validator::make(\Input::all(), $rules);
        //process the input
        if($validator->fails()){
            return \Redirect::to('maintenance/maintain_vendors/vendor_accounts/create')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        }else{
            //store the record
            $vendor_account = new MaintenanceVendor;
            $vendor_account->vendor_id = \Input::get('vendor_id');
            $vendor_account->vendor_name = \Input::get('vendor_name');
            $vendor_account->account_number = \Input::get('account_number');
            $vendor_account->expense_account = \Input::get('expense_account');
            $vendor_account->vendor_type_id = \Input::get('vendor_type_id');
            $vendor_account->address_street = \Input::get('address_street');
            $vendor_account->address_city = \Input::get('address_city');
            $vendor_account->address_province = \Input::get('address_province');
            $vendor_account->address_zip = \Input::get('address_zip');
            $vendor_account->address_country = \Input::get('address_country');
            $vendor_account->contact_mobile = \Input::get('contact_mobile');
            $vendor_account->contact_landline = \Input::get('contact_landline');
            $vendor_account->contact_email = \Input::get('contact_email');
            $vendor_account->contact_website = \Input::get('contact_website');
            $vendor_account->contact_fax = \Input::get('contact_fax');
            $vendor_account->contact_person = \Input::get('contact_person');
            $vendor_account->contact_role = \Input::get('contact_role');
            $vendor_account->status = \Input::get('status');

            $vendor_account->save();
            //redirect
            \Session::flash('message', 'Successfully added vendor.');
            return \Redirect::to('/maintenance/maintain_vendors/vendor_accounts');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendor = MaintenanceVendor::find($id);
        //show the view and pass the account
        return view('pages.maintenance.vendor_accounts.vendor_show')
            ->with('vendor', $vendor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //======================
        //chart_of_accounts
        //get all account type records from DB. The retrieved data will populate the 
        //Account Type option
        $chart_of_account_types_arr = MaintenanceChartOfAccountType::all();
        $chart_of_account_types_keys = array();
        $chart_of_account_types_values = array();

        //get all unique id from MaintenanceChartOfAccountType. this id will be used as key
        $chart_of_account_type_ids = self::getAllIdsFromMaintenanceChartOfAccountType($chart_of_account_types_arr);

        //store account_type in an array that will be combined with keys
        for($i = 0; $i < count($chart_of_account_types_arr); $i++){
            $types_arr = explode(',', $chart_of_account_types_arr[$i]);
            //get the id
            $chart_of_account_types_keys[$i] = str_replace('"', '',substr($types_arr[1], 16));
        }
        
        //store value in an array.
        for($i = 0; $i < count($chart_of_account_types_arr); $i++){
            $types_arr = explode(',', $chart_of_account_types_arr[$i]);
            //add the account_id to the value of account type string
            $chart_of_account_types_values[$i] =  $chart_of_account_types_keys[$i] . ' - ';

            $chart_of_account_types_values[$i] .= str_replace('"', '', (substr($types_arr[2], 21)));
        }
        //echo "<br/>";
        
        //combine array of keys and values
        $chart_of_account_types0 = array_combine($chart_of_account_types_keys, $chart_of_account_types_values);

        //combine array of ids with array of keys and values
        $chart_of_account_types = array_combine($chart_of_account_type_ids, $chart_of_account_types0);
        //======================

        //get all account type records from DB. The retrieved data will populate the 
        //vendor Type option
        $vendor_types_arr = MaintenanceVendorType::all();//returns array of arrays
        //return an array of all unique ids from MaintenanceVendorType. this id will be used as key
        $vendor_type_ids = self::getAllIdsFromMaintenanceVendorType($vendor_types_arr);
        //store account_type in an array that will be combined with keys
        $vendor_types_codes = self::getAllCodesFromMaintenanceVendorType($vendor_types_arr);
        //combine array of ids with array of keys and values
        $vendor_types = array_combine($vendor_type_ids, $vendor_types_codes);
        
        $vendor = MaintenanceVendor::find($id);
        return view('pages.maintenance.vendor_accounts.vendors_edit')
            ->with('vendor', $vendor)
            ->with('vendor_types', $vendor_types)
            ->with('chart_of_account_types', $chart_of_account_types);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $rules = array(
            'vendor_id' => 'required',
            'vendor_name' => 'required',
            'account_number' => 'required',
            'expense_account' => 'required',
            'vendor_type_id' => 'required',
            'address_street' => 'required',
            'address_city' => 'required',
            'address_province' => 'required',
            'address_zip' => 'required',
            'address_country' => 'required',
            'contact_mobile' => 'required',
            'contact_landline' => 'required',
            'contact_email' => 'required',
            'contact_website' => 'required',
            'contact_fax' => 'required',
            'contact_person' => 'required',
            'contact_role' => 'required',
            'status' => 'required'
        );

        $validator = \Validator::make(\Input::all(), $rules);
        //process the input
        if($validator->fails()){
            return \Redirect::to('maintenance/maintain_vendors/vendor_accounts/create')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        }else{
            //store the record
            $vendor_account = MaintenanceVendor::find($id);
            $vendor_account->vendor_id = \Input::get('vendor_id');
            $vendor_account->vendor_name = \Input::get('vendor_name');
            $vendor_account->account_number = \Input::get('account_number');
            $vendor_account->expense_account = \Input::get('expense_account');
            $vendor_account->vendor_type_id = \Input::get('vendor_type_id');
            $vendor_account->address_street = \Input::get('address_street');
            $vendor_account->address_city = \Input::get('address_city');
            $vendor_account->address_province = \Input::get('address_province');
            $vendor_account->address_zip = \Input::get('address_zip');
            $vendor_account->address_country = \Input::get('address_country');
            $vendor_account->contact_mobile = \Input::get('contact_mobile');
            $vendor_account->contact_landline = \Input::get('contact_landline');
            $vendor_account->contact_email = \Input::get('contact_email');
            $vendor_account->contact_website = \Input::get('contact_website');
            $vendor_account->contact_fax = \Input::get('contact_fax');
            $vendor_account->contact_person = \Input::get('contact_person');
            $vendor_account->contact_role = \Input::get('contact_role');
            $vendor_account->status = \Input::get('status');

            $vendor_account->save();
            //redirect
            \Session::flash('message', 'Successfully updated vendor.');
            return \Redirect::to('/maintenance/maintain_vendors/vendor_accounts');
        }

        /*
        $rules = array(
            'vendor_id' => 'required',
            'vendor_name' => 'required',
            'contact_number' => 'required',
            'account_number' => 'required',
            'vendor_type_id' => 'required'
        );

        $validator = \Validator::make(\Input::all(), $rules);
        //process the input
        if($validator->fails()){
            return \Redirect::to('maintenance/maintain_vendors/vendor_accounts/create')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        }else{
            //store the record
            $vendor_account = MaintenanceVendor::find($id);
            $vendor_account->vendor_id = \Input::get('vendor_id');
            $vendor_account->vendor_name = \Input::get('vendor_name');
            $vendor_account->contact_number = \Input::get('contact_number');
            $vendor_account->account_number = \Input::get('account_number');
            $vendor_account->vendor_type_id = \Input::get('vendor_type_id');
            //use vendor_type_id as key to get the code
            $vendor_type_id = MaintenanceVendorType::find(\Input::get('vendor_type_id'));
            $vendor_type_code = $vendor_type_id['vendor_type_code'];
            //echo "$vendor_type_code";
            $vendor_account->vendor_type = $vendor_type_code;
            $vendor_account->save();
            //redirect
            \Session::flash('message', 'Successfully updated vendor.');
            return \Redirect::to('/maintenance/maintain_vendors/vendor_accounts');
        }
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete record
        $vendor = MaintenanceVendor::find($id);
        $vendor->delete();
        \Session::flash('message', 'Successfully deleted vendor');
        return \Redirect::to('/maintenance/maintain_vendors/vendor_accounts');
    }

    public function getAllIdsFromMaintenanceVendorType($vendor_types_arr){
        $idsArray = array();
        foreach ($vendor_types_arr as $key => $value) {
            $idsArray[$key] = $value['id'];
        }
        return $idsArray;
    }

    public function getAllCodesFromMaintenanceVendorType($vendor_types_arr){
        $keysArray = array();
        foreach ($vendor_types_arr as $key => $value) {
            $keysArray[$key] = $value['vendor_type_code'];
        }
        return $keysArray;
    }

    public function getAllIdsFromMaintenanceChartOfAccountType($chart_of_account_types_arr){
        $idsArray = array();
        for($i = 0; $i < count($chart_of_account_types_arr); $i++){
            $types_arr = explode(',', $chart_of_account_types_arr[$i]);
            //get the id
            $idsArray[$i] = str_replace('"', '',substr($types_arr[0], 6));
        }    
        return $idsArray;
    }
}
