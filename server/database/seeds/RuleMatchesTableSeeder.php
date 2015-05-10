<?php

use App\RuleMatch;
use Illuminate\Database\Seeder;

class RuleMatchesTableSeeder extends Seeder {

    public function run()
    {
        $contents = file_get_contents(__DIR__ . "/stubs/rule_matches.json");

        $json = json_decode($contents);

        foreach ( $json->rule_matches as $ruleMatch )
        {
            RuleMatch::create(
                (array) $ruleMatch
            );
        }
    }
}