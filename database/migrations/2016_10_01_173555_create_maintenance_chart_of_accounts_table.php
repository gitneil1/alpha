<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenanceChartOfAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_chart_of_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account_id');
            $table->string('account_description');
            //$table->integer('account_type_id');//added for multiple update of account type
            $table->string('account_type');
            //$table->string('account_type_name');//added for simpler updating
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
        Schema::dropIfExists('maintenance_chart_of_accounts');
    }
}
