<?php

use App\Ruleset;
use Illuminate\Database\Seeder;

class RulesetTableSeeder extends Seeder {

    public function run()
    {
        $contents = file_get_contents(__DIR__ . "/stubs/rule_sets.json");

        $json = json_decode($contents);

        foreach ( $json->rule_sets as $ruleSet )
        {
            Ruleset::create(
                (array) $ruleSet
            );
        }
    }
}