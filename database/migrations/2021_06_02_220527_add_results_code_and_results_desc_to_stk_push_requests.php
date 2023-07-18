<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddResultsCodeAndResultsDescToStkPushRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stk_push_requests', function (Blueprint $table) {
            $table->string('results_desc')->nullable();
            $table->string('ResultCode')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stk_push_requests', function (Blueprint $table) {
            $table->dropColumn(['ResultCode','results_desc']);
        });
    }
}
