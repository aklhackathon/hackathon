<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixRulesetFkBug extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('gameplays', function(Blueprint $table)
		{
			$table->dropForeign('gameplays_ruleset_id_foreign');

            $table->foreign('ruleset_id')->references('id')->on('rulesets');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('gameplays', function(Blueprint $table)
		{
            $table->dropForeign('gameplays_ruleset_id_foreign');

            $table->foreign('ruleset_id')->references('id')->on('rules');
		});
	}

}
