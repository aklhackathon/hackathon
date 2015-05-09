<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRulesetHasRulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ruleset_has_rules', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('ruleset_id');
            $table->unsignedInteger('rule_id');
            $table->unsignedInteger('card_id');
			$table->timestamps();

            $table->foreign('ruleset_id')->references('id')->on('rulesets');
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
		Schema::drop('ruleset_has_rules');
	}

}
