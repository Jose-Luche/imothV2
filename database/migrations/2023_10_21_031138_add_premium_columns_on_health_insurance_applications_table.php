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
        Schema::table('health_insurance_applications', function (Blueprint $table) {
            $table->double('ip_premium')->after('childrenNumber')->default(0);
            $table->double('op_premium')->after('op_limit')->default(0);
            $table->double('dental_premium')->after('dental_limit')->default(0);
            $table->double('optical_premium')->after('optical_limit')->default(0);
            $table->double('maternity_premium')->after('maternity_limit')->default(0);
            $table->double('total_basic_premium')->after('endDate')->default(0);
            $table->double('phcf')->after('total_basic_premium')->default(0);
            $table->double('itl')->after('phcf')->default(0);
            $table->double('stamp_duty')->after('itl')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('health_insurance_applications', function (Blueprint $table) {
            $table->dropColumn(['ip_premium','op_premium','dental_premium','optical_premium','maternity_premium','total_basic_premium','phcf','itl','stamp_duty']);
        });
    }
};
