<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ChangeTurnIdToTurnNumber extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gameplays', function (Blueprint $table)
        {
            $table->dropForeign('gameplays_turn_id_foreign');

            $table->dropColumn('turn_id');

            $table->integer('turn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gameplays', function (Blueprint $table)
        {
            $table->dropColumn('turn');

            $table->unsignedInteger('turn_id');
        });
    }
}
