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
            $table->boolean('op')->after('childrenNumber')->default(false);
            $table->string('pp_pf')->after('op')->nullable();
            $table->double('op_limit')->after('pp_pf')->nullable();
            $table->boolean('dental')->after('op_limit')->default(false);        
            $table->double('dental_limit')->after('dental')->nullable();
            $table->boolean('optical')->after('dental_limit')->default(false);        
            $table->double('optical_limit')->after('optical')->nullable();
            $table->boolean('maternity')->after('optical_limit')->default(false);        
            $table->double('maternity_limit')->after('maternity')->nullable();
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
            $table->dropColumn(['op','pp_pf','op_limit','dental','dental_limit','optical','optical_limit','maternity','maternity_limit']);
        });
    }
};
