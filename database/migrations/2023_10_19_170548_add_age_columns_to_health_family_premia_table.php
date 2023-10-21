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
        Schema::table('health_family_premia', function (Blueprint $table) {
            $table->integer('fm_age_from')->after('limitId')->nullable();
            $table->integer('fm_age_to')->after('fm_age_from')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('health_family_premia', function (Blueprint $table) {
            $table->dropColumn(['fm_age_from', 'fm_age_to']);
        });
    }
};
