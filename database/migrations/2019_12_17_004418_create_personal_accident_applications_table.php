<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalAccidentApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_accident_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email');
            $table->string('phone');
            $table->date('startDate');
            $table->string('duration')->nullable();
            $table->text('companyName')->nullable();
            $table->string('children')->nullable();
            $table->string('childrenAges')->nullable();
            $table->string('spouseName')->nullable();
            $table->string('spouseAge')->nullable();
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
        Schema::dropIfExists('personal_accident_applications');
    }
}
