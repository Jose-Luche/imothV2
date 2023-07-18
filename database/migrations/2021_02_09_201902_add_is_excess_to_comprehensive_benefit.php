<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsExcessToComprehensiveBenefit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comprehensive_benefits', function (Blueprint $table) {
//            $table->float('price')->nullable()->change();
            $table->boolean('isExcess')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comprehensive_benefits', function (Blueprint $table) {
            $table->dropColumn('isExcess');
        });
    }
}
