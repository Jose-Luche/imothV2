<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformanceBondApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_bond_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email');
            $table->string('phone');
            $table->integer('quoteId');
            $table->string('company');
            $table->text('tenderNo');
            $table->string('physicalAddress');
            $table->string('tenderName');
            $table->string('bondValue');
            $table->string('period');
            $table->string('commencementDate');
            $table->string('description');
            $table->string('endDate');
            $table->string('contractPrice');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performance_bond_applications');
    }
}
