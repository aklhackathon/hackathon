<?php

use App\Gameplay;
use Illuminate\Database\Seeder;

class GameplayTableSeeder extends Seeder {

    public function run()
    {
        /** @var Gameplay $gameplay */
        $gameplay = Gameplay::create(
            [
                'ruleset_id' => 1,
            ]);
    }
}