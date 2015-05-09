<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameplayHasUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gameplay_has_users', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('gameplay_id');
            $table->unsignedInteger('user_id');
            $table->integer('order');

			$table->timestamps();

            $table->foreign('gameplay_id')->references('id')->on('gameplays');
            $table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gameplay_has_users');
	}

}
