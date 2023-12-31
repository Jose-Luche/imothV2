<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUnclaimedToMpesaTrasnactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mpesa_transactions', function (Blueprint $table) {
            $table->boolean('unclaimed')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mpesa_transactions', function (Blueprint $table) {
            $table->dropColumn('unclaimed');
        });
    }
}
