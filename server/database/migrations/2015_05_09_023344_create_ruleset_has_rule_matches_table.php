<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRulesetHasRuleMatchesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruleset_has_rule_matches', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('ruleset_id');
            $table->unsignedInteger('rule_match_id');
            $table->timestamps();

            $table->foreign('ruleset_id')->references('id')->on('rulesets');
            $table->foreign('rule_match_id')->references('id')->on('rule_matches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ruleset_has_rule_matches');
    }
}
