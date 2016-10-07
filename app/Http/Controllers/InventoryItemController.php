<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Maintenance\MaintenanceInventoryItem;

class InventoryItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventory_items = MaintenanceInventoryItem::all();
        return view('pages.maintenance.inventory_items.inventory_items_index')
            ->with('inventory_items', $inventory_items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.maintenance.inventory_items.inventory_items_create');
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
            'inventory_item_id' => 'required',
            'inventory_item_class' => 'required'
        );

        $validator = \Validator::make(\Input::all(), $rules);
        //process the input
        if($validator->fails()){
            return \Redirect::to('/maintenance/maintain_inventory/inventory_items/create')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        }else{
            //store the record
            $inventory_item = new MaintenanceInventoryItem;
            $inventory_item->inventory_item_id = \Input::get('inventory_item_id');
            $inventory_item->inventory_item_class = \Input::get('inventory_item_class');
            $inventory_item->save();
            //redirect
            \Session::flash('message', 'Successfully added inventory item.');
            return \Redirect::to('/maintenance/maintain_inventory_items/inventory_items');
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
        $inventory_item = MaintenanceInventoryItem::find($id);
        return view('pages.maintenance.inventory_items.inventory_items_show')
            ->with('inventory_item', $inventory_item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventory_item = MaintenanceInventoryItem::find($id);
        return view('pages.maintenance.inventory_items.inventory_items_edit')
            ->with('inventory_item', $inventory_item);
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
            'inventory_item_id' => 'required',
            'inventory_item_class' => 'required'
        );

        $validator = \Validator::make(\Input::all(), $rules);
        //process the input
        if($validator->fails()){
            return \Redirect::to('/maintenance/maintain_inventory/inventory_items/create')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        }else{
            //store the record
            $inventory_item = MaintenanceInventoryItem::find($id);
            $inventory_item->inventory_item_id = \Input::get('inventory_item_id');
            $inventory_item->inventory_item_class = \Input::get('inventory_item_class');
            $inventory_item->save();
            //redirect
            \Session::flash('message', 'Successfully updated inventory item.');
            return \Redirect::to('/maintenance/maintain_inventory_items/inventory_items');
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
        $inventory_item = MaintenanceInventoryItem::find($id);
        $inventory_item->delete();
        //redirect
            \Session::flash('message', 'Successfully deleted inventory item.');
            return \Redirect::to('/maintenance/maintain_inventory_items/inventory_items');
    }
}
