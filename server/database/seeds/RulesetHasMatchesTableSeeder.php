<?php

use App\RuleMatch;
use App\Ruleset;
use Illuminate\Database\Seeder;

class RulesetHasMatchesTableSeeder extends Seeder {

    public function run()
    {
        $contents = file_get_contents(__DIR__ . "/stubs/ruleset_has_matches.json");

        $json = json_decode($contents);

        foreach ( $json->ruleset_has_matches as $row )
        {
            /** @var Ruleset $ruleSet */
            $ruleSet = Ruleset::find($row->ruleset_id);

            /** @var RuleMatch $ruleMatch */
            $ruleMatch = RuleMatch::find($row->rule_match_id);

            $ruleSet->ruleMatches()->save($ruleMatch);

        }
    }
}