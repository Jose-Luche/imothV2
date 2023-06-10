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
        Schema::create('health_principal_premia', function (Blueprint $table) {
            $table->id();
            $table->integer('limitId')->nullable();
            $table->string('age_from', 100)->nullable();
            $table->string('age_to', 100)->nullable();
            $table->string('princ_premium', 100)->nullable();
            $table->string('child_premium', 100)->nullable();
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
        Schema::dropIfExists('health_principal_premia');
    }
};
