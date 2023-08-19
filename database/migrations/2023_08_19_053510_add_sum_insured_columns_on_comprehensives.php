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
        Schema::table('comprehensives', function (Blueprint $table) {
            $table->double('si_from')->after('rate')->default(0)->nullable();
            $table->double('si_to')->after('si_from')->default(0)->nullable();
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
            $table->dropColumn(['si_from', 'si_to']);
        });
    }
};
