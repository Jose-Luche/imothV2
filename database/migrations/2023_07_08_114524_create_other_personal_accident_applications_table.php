<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_personal_accident_applications', function (Blueprint $table) {
            $table->id();
            $table->integer('type')->nullable();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('insurance_id')->nullable();
            $table->date('startDate')->nullable();
            $table->string('category')->nullable();
            $table->string('duration')->nullable();
            $table->text('companyName')->nullable();
            $table->string('children')->nullable();
            $table->string('childrenAges')->nullable();
            $table->string('spouseName')->nullable();
            $table->string('spouseAge')->nullable();
            $table->date('commencementDate')->nullable();
            $table->date('endDate')->nullable();
            $table->string('premiumPayable')->nullable();
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
        Schema::dropIfExists('other_personal_accident_applications');
    }
};
