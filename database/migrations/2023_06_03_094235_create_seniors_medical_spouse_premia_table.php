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
        Schema::create('seniors_medical_spouse_premia', function (Blueprint $table) {
            $table->id();
            $table->integer('limitId')->nullable();
            $table->string('sp_age_from', 100)->nullable();
            $table->string('sp_age_to', 100)->nullable();
            $table->string('sp_premium', 100)->nullable();
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
        Schema::dropIfExists('seniors_medical_spouse_premia');
    }
};
