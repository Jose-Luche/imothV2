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
        Schema::create('personal_accidents', function (Blueprint $table) {
            $table->id();
            $table->integer('companyId')->unsigned();
            $table->string('category');
            $table->float('rate');
            $table->float('minRate')->default(0)->nullable();
            $table->string('duration')->default('three-month');
            $table->float('three_month')->default(0);
            $table->float('six_month')->default(0);
            $table->float('one_year')->default(0);
            $table->text('details')->nullable();
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
        Schema::dropIfExists('personal_accidents');
    }
};
