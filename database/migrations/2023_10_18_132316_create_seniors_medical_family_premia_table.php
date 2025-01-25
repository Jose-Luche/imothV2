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
        Schema::create('seniors_medical_family_premia', function (Blueprint $table) {
            $table->id();
            $table->integer('limitId')->nullable();
            $table->double('m')->nullable();
            $table->double('m_plus_one')->nullable();
            $table->double('m_plus_two')->nullable();
            $table->double('m_plus_three')->nullable();
            $table->double('m_plus_four')->nullable();
            $table->double('m_plus_five')->nullable();
            $table->double('m_plus_six')->nullable();
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
        Schema::dropIfExists('seniors_medical_family_premia');
    }
};
