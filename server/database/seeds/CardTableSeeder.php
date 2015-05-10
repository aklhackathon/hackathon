<?php

use App\Card;
use Illuminate\Database\Seeder;

class CardTableSeeder extends Seeder {

    public function run()
    {
        $contents = file_get_contents(__DIR__ . "/stubs/cards.json");

        $json = json_decode($contents);

        foreach ( $json->cards as $card )
        {
            Card::create(
                (array) $card
            );
        }
    }
}