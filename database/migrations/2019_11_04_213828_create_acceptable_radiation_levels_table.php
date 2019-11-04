<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcceptableRadiationLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acceptable_radiation_levels', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('raw_id');
            $table->foreign('raw_id')
                ->references('id')->on('raws')
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
        Schema::dropIfExists('acceptable_radiation_levels');
    }
}
