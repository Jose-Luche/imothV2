<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRateTypeToComprehensives extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comprehensives', function (Blueprint $table) {
            $table->float('minRate');
            $table->integer('minYear')->default(2001);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comprehensives', function (Blueprint $table) {
            //
        });
    }
}
