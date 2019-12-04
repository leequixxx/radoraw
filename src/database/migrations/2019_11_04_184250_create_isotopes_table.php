<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsotopesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isotopes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedDecimal('mass', 6, 3);
            $table->string('name', 64);

            $table->unsignedSmallInteger('element_index');
            $table->foreign('element_index')
                ->references('index')->on('elements')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('isotopes');
    }
}
