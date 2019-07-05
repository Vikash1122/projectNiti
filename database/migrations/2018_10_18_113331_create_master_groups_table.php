<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group_name');
            $table->date('group_date');
            $table->string('service_id');
            $table->integer('team_leader');
            $table->integer('driver_id')->nullable();
            $table->integer('vehicle_id')->nullable();
            $table->integer('employee_id');
            $table->string('day_slot')->nullable();
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
        Schema::dropIfExists('master_groups');
    }
}
