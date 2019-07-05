<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vehicle_type');
            $table->string('reg_card_copy')->nullable();
            $table->string('manufacturer');
            $table->string('vehicle_no');
            $table->string('modal_no');
            $table->date('manufacturing_year')->nullable();
            $table->string('vehicle_partner');
            $table->string('owner_name');
            $table->string('vehicle_color')->nullable();
            $table->string('registration_number');
            $table->date('registration_expiration');
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('master_vehicles');
    }
}
