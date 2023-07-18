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
        Schema::table('other_personal_accident_applications', function (Blueprint $table) {
            $table->boolean('complete')->after('premiumPayable')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('other_personal_accident_applications', function (Blueprint $table) {
            $table->dropColumn(['premiumPayable']);
        });
    }
};
