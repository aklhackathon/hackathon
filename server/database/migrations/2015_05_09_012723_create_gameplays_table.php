<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameplaysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gameplays', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('code');
            $table->unsignedInteger('ruleset_id');
            $table->unsignedInteger('turn_id');
			$table->timestamps();

            $table->foreign('ruleset_id')->references('id')->on('rules');
            $table->foreign('turn_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gameplays');
	}

}
