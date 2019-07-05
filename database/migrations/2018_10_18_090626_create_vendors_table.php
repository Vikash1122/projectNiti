<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('registration_no');
            $table->string('owner_name');
            $table->string('email');
            $table->integer('fax_no')->nullable();
            $table->string('address');
            $table->string('warehouse_addr')->nullable();
            $table->string('contact_person_name');
            $table->string('profile_pic')->nullable();
            $table->string('designation');
            $table->integer('mobile');
            $table->string('contact_person_email');
            $table->integer('emirates_id')->nullable();
            $table->integer('payment_term');
            $table->string('payment_method');
            $table->string('tax_reg_number')->nullable();
            $table->string('building_address')->nullable();
            $table->string('bank_name');
            $table->string('ifsc_code');
            $table->string('branch_code');
            $table->string('account_no');
            $table->string('account_holder_name');
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
        Schema::dropIfExists('vendors');
    }
}
