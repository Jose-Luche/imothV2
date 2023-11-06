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
        Schema::create('last_expenses', function (Blueprint $table) {
            $table->id();
            $table->integer('companyId')->nullable();
            $table->double('limit')->nullable();
            $table->double('premium')->nullable();
            $table->integer('max_child_limit')->nullable();
            $table->double('additional_child_premium')->nullable();
            $table->longText('details')->nullable();
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
        Schema::dropIfExists('last_expenses');
    }
};
