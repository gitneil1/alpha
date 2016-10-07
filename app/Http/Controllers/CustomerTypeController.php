<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Maintenance\MaintenanceCustomerType;
use App\Models\Maintenance\MaintenanceCustomer;

class CustomerTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer_types = MaintenanceCustomerType::all();
        return view('pages.maintenance.customer_types.customer_type_index')
            ->with('customer_types', $customer_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.maintenance.customer_types.customer_type_create');
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
            'customer_type_name' => 'required',
            'customer_type_code' => 'required'
        );

        $validator = \Validator::make(\Input::all(), $rules);
        //process the input
        if($validator->fails()){
            return \Redirect::to('/maintenance/maintain_customers/customer_types/create')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        }else{
            //store the record
            $customer_type = new MaintenanceCustomerType;
            $customer_type->customer_type_name = \Input::get('customer_type_name');
            $customer_type->customer_type_code = \Input::get('customer_type_code');
            $customer_type->save();
            //redirect
            \Session::flash('message', 'Successfully added customer type.');
            return \Redirect::to('/maintenance/maintain_customers/customer_types');
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
        $customer_type = MaintenanceCustomerType::find($id);
        //show the view and pass the customer type
        return view('pages.maintenance.customer_types.customer_type_show')
            ->with('customer_type', $customer_type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer_type = MaintenanceCustomerType::find($id);
        return view('pages.maintenance.customer_types.customer_type_edit')
            ->with('customer_type', $customer_type);
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
            'customer_type_code' => 'required',
            'customer_type_name' => 'required'
        );

        $validator = \Validator::make(\Input::all(), $rules);
        //process the update
        if($validator->fails()){
            return \Redirect::to('maintenance/maintain_customers/customer_types/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        }else{
            //save the update
            $customer_type = MaintenanceCustomerType::find($id);
            $customer_type->customer_type_code = \Input::get('customer_type_code');
            $customer_type->customer_type_name = \Input::get('customer_type_name');
            //save changes to the database
            $customer_type->save();
            
            //get all account types with this id then update 
            MaintenanceCustomer::where('customer_type_id', '=', $id)
                ->update([
                    'customer_type' => \Input::get('customer_type_code')
                ]);
               

            //redirect
            \Session::flash('message', 'Successfully updated customer type');
            return \Redirect::to('maintenance/maintain_customers/customer_types');
        }
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
        $customer_type = MaintenanceCustomerType::find($id);
        $customer_type->delete();
        \Session::flash('message', 'Successfully deleted record');
        return \Redirect::to('maintenance/maintain_customers/customer_types');
    }
}
