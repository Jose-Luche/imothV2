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
        Schema::table('last_expenses', function (Blueprint $table) {
            $table->double('spouse_limit')->after('limit')->default(0);
            $table->double('child_limit')->after('spouse_limit')->default(0);
            $table->double('parent_limit')->after('child_limit')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('last_expenses', function (Blueprint $table) {
            $table->dropColumn(['spouse_limit','child_limit','parent_limit']);
        });
    }
};
