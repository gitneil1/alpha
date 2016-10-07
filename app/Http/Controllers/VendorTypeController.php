<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Maintenance\MaintenanceVendorType;
use App\Models\Maintenance\MaintenanceVendor;

class VendorTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendor_types = MaintenanceVendorType::all();
        return view('pages.maintenance.vendor_types.vendor_type_index')
            ->with('vendor_types', $vendor_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.maintenance.vendor_types.vendor_type_create');
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
            'vendor_type_name' => 'required',
            'vendor_type_code' => 'required'
        );

        $validator = \Validator::make(\Input::all(), $rules);
        //process the input
        if($validator->fails()){
            return \Redirect::to('/maintenance/maintain_vendors/vendor_types/create')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        }else{
            //store the record
            $vendor_type = new MaintenanceVendorType;
            $vendor_type->vendor_type_name = \Input::get('vendor_type_name');
            $vendor_type->vendor_type_code = \Input::get('vendor_type_code');
            $vendor_type->save();
            //redirect
            \Session::flash('message', 'Successfully added vendor type.');
            return \Redirect::to('/maintenance/maintain_vendors/vendor_types');
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
        $vendor_type = MaintenanceVendorType::find($id);
        //show the view and pass the vendor type
        return view('pages.maintenance.vendor_types.vendor_type_show')
            ->with('vendor_type', $vendor_type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor_type = MaintenanceVendorType::find($id);
        return view('pages.maintenance.vendor_types.vendor_type_edit')
            ->with('vendor_type', $vendor_type);
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
            'vendor_type_code' => 'required',
            'vendor_type_name' => 'required'
        );

        $validator = \Validator::make(\Input::all(), $rules);
        //process the update
        if($validator->fails()){
            return \Redirect::to('maintenance/maintain_vendors/vendor_types/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        }else{
            //save the update
            $vendor_type = MaintenanceVendorType::find($id);
            $vendor_type->vendor_type_code = \Input::get('vendor_type_code');
            $vendor_type->vendor_type_name = \Input::get('vendor_type_name');
            //save changes to the database
            $vendor_type->save();
            
            //get all account types with this id then update 
            MaintenanceVendor::where('vendor_type_id', '=', $id)
                ->update([
                    'vendor_type' => \Input::get('vendor_type_code')
                ]);
               

            //redirect
            \Session::flash('message', 'Successfully updated vendor type');
            return \Redirect::to('maintenance/maintain_vendors/vendor_types');
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
        $vendor_type = MaintenanceVendorType::find($id);
        $vendor_type->delete();
        \Session::flash('message', 'Successfully deleted record');
        return \Redirect::to('maintenance/maintain_vendors/vendor_types');
    }
}
