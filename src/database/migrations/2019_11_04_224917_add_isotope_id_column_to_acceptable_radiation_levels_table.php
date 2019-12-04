<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsotopeIdColumnToAcceptableRadiationLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('acceptable_radiation_levels', function (Blueprint $table) {
            $table->unsignedBigInteger('isotope_id');
            $table->foreign('isotope_id')
                ->references('id')->on('isotopes')
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
        Schema::table('acceptable_radiation_levels', function (Blueprint $table) {
            $table->dropColumn(['isotope_id']);
        });
    }
}
