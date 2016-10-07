<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;

class InventoryPO extends Model
{
	protected $table = 'inventory_pos';
    protected $primaryKey = 'log';
}
