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
        Schema::create('quotation_clauses', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->integer('compId')->unsigned();
            $table->string('product')->nullable();
            $table->string('class')->nullable();
            $table->longText('clauses')->nullable();
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
        Schema::dropIfExists('quotation_clauses');
    }
};
