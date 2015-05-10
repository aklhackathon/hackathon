<?php

use App\Rule;
use Illuminate\Database\Seeder;

class RuleTableSeeder extends Seeder {

    public function run()
    {
        $contents = file_get_contents(__DIR__ . "/stubs/rules.json");

        $json = json_decode($contents);

        foreach ( $json->rules as $rule )
        {
            Rule::create(
                (array) $rule
            );
        }
    }
}