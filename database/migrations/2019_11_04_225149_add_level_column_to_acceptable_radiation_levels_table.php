<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLevelColumnToAcceptableRadiationLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('acceptable_radiation_levels', function (Blueprint $table) {
            $table->decimal('level')->nullable();
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
            $table->dropColumn(['level']);
        });
    }
}
