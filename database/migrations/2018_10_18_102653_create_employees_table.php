<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('profile_pic');
            $table->string('emp_role');
            $table->string('service_type');
            $table->string('employee_code');
            $table->string('employee_name');
            $table->integer('emp_mobile');
            $table->date('date_of_birth');
            $table->integer('age')->nullable();
            $table->string('email_id');
            $table->string('country');
            $table->string('city')->nullable();
            $table->string('nationality');
            $table->string('local_address')->nullable();
            $table->string('permanent_address');
            $table->string('passport_number');
            $table->date('passport_exp_date');
            $table->date('visa_expiration');
            $table->string('emirates_id');
            $table->date('emirates_exp_date')->nullable();
            $table->string('passport_doc');
            $table->string('visa_doc');
            $table->string('emirates_id_copy');
            $table->string('driving_licence_copy');
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
        Schema::dropIfExists('employees');
    }
}
