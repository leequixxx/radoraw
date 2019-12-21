<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActionsColumnsToAcceptableRadiationLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('acceptable_radiation_levels', function (Blueprint $table) {
            $table->string('action_on_normal', 64)->default('Для продовольствия');
            $table->string('action_on_danger', 64)->default('На переработку');
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
            $table->dropColumn(['action_on_normal', 'action_on_danger']);
        });
    }
}
