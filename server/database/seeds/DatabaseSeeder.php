<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		 $this->call(RuleTableSeeder::class);
		 $this->call(CardTableSeeder::class);
		 $this->call(RulesetTableSeeder::class);
		 $this->call(RuleMatchesTableSeeder::class);
		 $this->call(RulesetHasMatchesTableSeeder::class);
		 $this->call(GameplayTableSeeder::class);
	}

}
