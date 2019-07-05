<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vehicle_type');
            $table->string('manufacturer');
            $table->string('vehicle_no');
            $table->string('modal_no');
            $table->date('manufacturing_year');
            $table->string('vehicle_partner');
            $table->string('owner_name');
            $table->string('vehilce_color')->nullable();
            $table->string('registration_number');
            $table->date('registration_expiration')->nullable();
            $table->string('registration_card')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}
