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
        Schema::create('travel_applications', function (Blueprint $table) {
            $table->id();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->integer('quoteId')->nullable();
            $table->string('travelFrom')->nullable();
            $table->string('travelTo')->nullable();
            $table->string('period')->nullable();
            $table->string('limit')->default(0);
            $table->string('expectedValue')->default(0);
            $table->date('startDate')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('travel_applications');
    }
};
