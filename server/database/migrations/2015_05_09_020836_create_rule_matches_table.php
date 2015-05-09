<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRuleMatchesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rule_matches', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('rule_id');
            $table->unsignedInteger('card_id');
            $table->timestamps();

            $table->foreign('rule_id')->references('id')->on('rules');
            $table->foreign('card_id')->references('id')->on('cards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rule_matches');
    }
}
