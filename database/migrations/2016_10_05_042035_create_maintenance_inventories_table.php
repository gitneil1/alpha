<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenanceInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_inventories', function (Blueprint $table) {
            $table->increments('log');
            $table->string('inventory_id');
            $table->string('inventory_description');
            $table->string('inventory_item_id');
            $table->string('gl_sales_account');
            $table->string('gl_inventory_account');
            $table->string('gl_cost_of_sales_account');
            //$table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenance_inventories');
    }
}
