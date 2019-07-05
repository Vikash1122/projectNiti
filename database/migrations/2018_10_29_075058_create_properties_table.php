<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('city');
            $table->string('villa_or_aptNo');
            $table->string('building_name');
            $table->integer('no_ofBedrooms')->nullable();
            $table->string('area')->nullable();
            $table->string('street_no')->nullable();
            $table->integer('lat')->nullable();
            $table->integer('lng')->nullable();
            $table->string('address');
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
        Schema::dropIfExists('properties');
    }
}
