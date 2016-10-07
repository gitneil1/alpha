<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Maintenance\MaintenanceCustomerType;
use App\Models\Maintenance\MaintenanceCustomer;
use App\Models\Maintenance\MaintenanceChartOfAccountType;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retrieve all records
        $customers = MaintenanceCustomer::all();
        //load the view with the array of data
        return view('pages.maintenance.customer_accounts.customers_index')
            ->with('customers', $customers);
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
        //customer Type option
        $customer_types_arr = MaintenanceCustomerType::all();//returns array of arrays
        $customer_types = self::getCombinedArrayOfKeysAndValues($customer_types_arr);
        //==============================================
        //return an array of all unique ids from MaintenancecustomerType. this id will be used as key
        //$customer_type_ids = self::getAllIdsFromMaintenancecustomerType($customer_types_arr);
        //store account_type in an array that will be combined with keys
        //$customer_types_codes = self::getAllCodesFromMaintenancecustomerType($customer_types_arr);
        //combine array of ids with array of keys and values
        //$customer_types = array_combine($customer_type_ids, $customer_types_codes);
        //===============================================
        return view('pages.maintenance.customer_accounts.customer_accounts_create')
            ->with('customer_types', $customer_types)
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
            'customer_id' => 'required',
            'customer_name' => 'required',
            'account_number' => 'required',
            'expense_account' => 'required',
            'customer_type_id' => 'required',
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
            return \Redirect::to('maintenance/maintain_customers/customer_accounts/create')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        }else{
            //store the record
            $customer_account = new MaintenanceCustomer;
            $customer_account->customer_id = \Input::get('customer_id');
            $customer_account->customer_name = \Input::get('customer_name');
            $customer_account->account_number = \Input::get('account_number');
            $customer_account->expense_account = \Input::get('expense_account');
            $customer_account->customer_type_id = \Input::get('customer_type_id');
            $customer_account->address_street = \Input::get('address_street');
            $customer_account->address_city = \Input::get('address_city');
            $customer_account->address_province = \Input::get('address_province');
            $customer_account->address_zip = \Input::get('address_zip');
            $customer_account->address_country = \Input::get('address_country');
            $customer_account->contact_mobile = \Input::get('contact_mobile');
            $customer_account->contact_landline = \Input::get('contact_landline');
            $customer_account->contact_email = \Input::get('contact_email');
            $customer_account->contact_website = \Input::get('contact_website');
            $customer_account->contact_fax = \Input::get('contact_fax');
            $customer_account->contact_person = \Input::get('contact_person');
            $customer_account->contact_role = \Input::get('contact_role');
            $customer_account->status = \Input::get('status');

            $customer_account->save();
            //redirect
            \Session::flash('message', 'Successfully added customer.');
            return \Redirect::to('/maintenance/maintain_customers/customer_accounts');
        }
        /*
        $rules = array(
            'customer_id' => 'required',
            'customer_name' => 'required',
            'contact_number' => 'required',
            'address' => 'required',
            'customer_type_id' => 'required'
        );

        $validator = \Validator::make(\Input::all(), $rules);
        //process the input
        if($validator->fails()){
            return \Redirect::to('maintenance/maintain_customers/customer_accounts/create')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        }else{
            //store the record
            $customer_account = new MaintenanceCustomer;
            $customer_account->customer_id = \Input::get('customer_id');
            $customer_account->customer_name = \Input::get('customer_name');
            $customer_account->contact_number = \Input::get('contact_number');
            $customer_account->address = \Input::get('address');
            $customer_account->customer_type_id = \Input::get('customer_type_id');
            //use customer_type_id as key to get the code
            $customer_type_id = MaintenanceCustomerType::find(\Input::get('customer_type_id'));
            $customer_type_code = $customer_type_id['customer_type_code'];
            
            $customer_account->customer_type = $customer_type_code;
            $customer_account->save();
            //redirect
            \Session::flash('message', 'Successfully added customer.');
            return \Redirect::to('/maintenance/maintain_customers/customer_accounts');
        }
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = MaintenanceCustomer::find($id);
        //show the view and pass the account
        return view('pages.maintenance.customer_accounts.customer_show')
            ->with('customer', $customer);
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
        //customer Type option
        $customer_types_arr = MaintenanceCustomerType::all();//returns array of arrays
        $customer_types = self::getCombinedArrayOfKeysAndValues($customer_types_arr);
        
        $customer = MaintenanceCustomer::find($id);
        return view('pages.maintenance.customer_accounts.customers_edit')
            ->with('customer', $customer)
            ->with('customer_types', $customer_types)
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
            'customer_id' => 'required',
            'customer_name' => 'required',
            'account_number' => 'required',
            'expense_account' => 'required',
            'customer_type_id' => 'required',
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
            return \Redirect::to('maintenance/maintain_customers/customer_accounts/create')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        }else{
            //store the record
            $customer_account = MaintenanceCustomer::find($id);
            $customer_account->customer_id = \Input::get('customer_id');
            $customer_account->customer_name = \Input::get('customer_name');
            $customer_account->account_number = \Input::get('account_number');
            $customer_account->expense_account = \Input::get('expense_account');
            $customer_account->customer_type_id = \Input::get('customer_type_id');
            $customer_account->address_street = \Input::get('address_street');
            $customer_account->address_city = \Input::get('address_city');
            $customer_account->address_province = \Input::get('address_province');
            $customer_account->address_zip = \Input::get('address_zip');
            $customer_account->address_country = \Input::get('address_country');
            $customer_account->contact_mobile = \Input::get('contact_mobile');
            $customer_account->contact_landline = \Input::get('contact_landline');
            $customer_account->contact_email = \Input::get('contact_email');
            $customer_account->contact_website = \Input::get('contact_website');
            $customer_account->contact_fax = \Input::get('contact_fax');
            $customer_account->contact_person = \Input::get('contact_person');
            $customer_account->contact_role = \Input::get('contact_role');
            $customer_account->status = \Input::get('status');

            $customer_account->save();
            //redirect
            \Session::flash('message', 'Successfully added customer.');
            return \Redirect::to('/maintenance/maintain_customers/customer_accounts');
        }
        /*
        $rules = array(
            'customer_id' => 'required',
            'customer_name' => 'required',
            'contact_number' => 'required',
            'address' => 'required',
            'customer_type_id' => 'required'
        );

        $validator = \Validator::make(\Input::all(), $rules);
        //process the input
        if($validator->fails()){
            return \Redirect::to('maintenance/maintain_customers/customer_accounts/create')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        }else{
            //store the record
            $customer_account = MaintenanceCustomer::find($id);
            $customer_account->customer_id = \Input::get('customer_id');
            $customer_account->customer_name = \Input::get('customer_name');
            $customer_account->contact_number = \Input::get('contact_number');
            $customer_account->address = \Input::get('address');
            $customer_account->customer_type_id = \Input::get('customer_type_id');
            //use customer_type_id as key to get the code
            $customer_type_id = MaintenanceCustomerType::find(\Input::get('customer_type_id'));
            $customer_type_code = $customer_type_id['customer_type_code'];
            
            $customer_account->customer_type = $customer_type_code;
            $customer_account->save();
            //redirect
            \Session::flash('message', 'Successfully updated customer.');
            return \Redirect::to('/maintenance/maintain_customers/customer_accounts');
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
        $customer = MaintenanceCustomer::find($id);
        $customer->delete();
        \Session::flash('message', 'Successfully deleted customer');
        return \Redirect::to('/maintenance/maintain_customers/customer_accounts');
    }

    public function getAllIdsFromMaintenanceCustomerType($customer_types_arr){
        $idsArray = array();
        foreach ($customer_types_arr as $key => $value) {
            $idsArray[$key] = $value['id'];
        }
        return $idsArray;
    }

    public function getAllCodesFromMaintenanceCustomerType($customer_types_arr){
        $keysArray = array();
        foreach ($customer_types_arr as $key => $value) {
            $keysArray[$key] = $value['customer_type_code'];
        }
        return $keysArray;
    }

    public function getCombinedArrayOfKeysAndValues($customer_types_arr){
        //return an array of all unique ids from MaintenancecustomerType. this id will be used as key
        $customer_type_ids = self::getAllIdsFromMaintenancecustomerType($customer_types_arr);
        //store account_type in an array that will be combined with keys
        $customer_types_codes = self::getAllCodesFromMaintenancecustomerType($customer_types_arr);
        //combine array of ids with array of keys and values
        return array_combine($customer_type_ids, $customer_types_codes);
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
