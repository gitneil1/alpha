<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryReceivingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_receivings', function (Blueprint $table) {
            $table->increments('log');
            $table->string('ri_num');
            $table->string('po_num');
            $table->string('vendor_id');
            $table->string('ri_date');
            $table->string('ri_due_date');
            $table->string('terms');
            $table->string('status');
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
        Schema::dropIfExists('inventory_receivings');
    }
}
