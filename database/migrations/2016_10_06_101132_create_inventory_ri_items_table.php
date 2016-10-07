<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryRiItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_ri_items', function (Blueprint $table) {
            $table->increments('log');
            $table->string('ri_num');
            $table->string('qty');
            $table->string('inventory_id');
            $table->string('unit_price');
            $table->string('vat');
            $table->string('cost_center_id');
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
        Schema::dropIfExists('inventory_ri_items');
    }
}
