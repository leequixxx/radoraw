<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollutionFactorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pollution_factors', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('soil_id');
            $table->foreign('soil_id')
                ->references('id')->on('soils')
                ->onDelete('cascade');

            $table->unsignedBigInteger('raw_id');
            $table->foreign('raw_id')
                ->references('id')->on('raws')
                ->onDelete('cascade');

            $table->unsignedBigInteger('isotope_id');
            $table->foreign('isotope_id')
                ->references('id')->on('isotopes')
                ->onDelete('cascade');

            $table->decimal('coefficient', 6, 3);

            $table->unsignedBigInteger('order')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pollution_factors');
    }
}
