<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotorApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motor_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type');
            $table->integer('insuranceType');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email');
            $table->string('phone');
            $table->string('value')->nullable();
            $table->string('valued');
            $table->string('vehicleUse');
            $table->string('carMake');
            $table->string('year')->nullable();
            $table->string('date');
            $table->string('RegNo')->nullable();
            $table->string('vehicleType')->nullable();
            $table->integer('passengers')->nullable();
            $table->string('tonnage')->nullable();
            $table->string('policy')->nullable();
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
        Schema::dropIfExists('motor_applications');
    }
}
