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
        Schema::table('seniors_medicals', function (Blueprint $table) {
            $table->string('pp_pf')->after('benefit_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seniors_medicals', function (Blueprint $table) {
            $table->dropColumn(['pp_pf']);
        });
    }
};
