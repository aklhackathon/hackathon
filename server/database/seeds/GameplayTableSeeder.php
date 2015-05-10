<?php

use App\Gameplay;
use Illuminate\Database\Seeder;

class GameplayTableSeeder extends Seeder {

    public function run()
    {
        $contents = file_get_contents(__DIR__ . "/stubs/cards.json");

        $json = json_decode($contents);

        foreach ( $json->cards as $card )
        {
            /** @var Gameplay $gameplay */
            $gameplay = Gameplay::create(
                [
                    'ruleset_id' => 1,
                ]);
        }
    }
}