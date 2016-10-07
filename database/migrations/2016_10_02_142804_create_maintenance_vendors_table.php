<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenanceVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_vendors', function (Blueprint $table) {
            $table->increments('log');//changed 'id' to 'log'
            $table->string('vendor_id');
            $table->string('vendor_name');
            //$table->string('contact_number');
            $table->string('account_number');
            $table->string('expense_account');//unique coa_type id
            $table->integer('vendor_type_id');//unique
            //start modification
            $table->string('address_street');
            $table->string('address_city');
            $table->string('address_province');
            $table->string('address_zip');
            $table->string('address_country');
            $table->string('contact_mobile');
            $table->string('contact_landline');
            $table->string('contact_email');
            $table->string('contact_website');
            $table->string('contact_fax');
            $table->string('contact_person');
            $table->string('contact_role');
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
        Schema::dropIfExists('maintenance_vendors');
    }
}
