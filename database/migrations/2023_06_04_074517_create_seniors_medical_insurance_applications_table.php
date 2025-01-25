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
        Schema::create('seniors_medical_insurance_applications', function (Blueprint $table) {
            $table->id();
            $table->integer('companyId')->nullable();
            $table->string('limitId')->nullable();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('principalAge')->nullable();
            $table->string('spouseAge')->nullable();
            $table->string('childrenNumber')->nullable();
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
        Schema::dropIfExists('seniors_medical_insurance_applications');
    }
};
