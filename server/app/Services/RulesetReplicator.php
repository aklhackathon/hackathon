<?php


namespace App\Services;

use App\RuleMatch;
use App\Ruleset;

class RulesetReplicator {

    /**
     * @param Ruleset $ruleset
     * @return Ruleset
     */
    public function replicate(Ruleset $ruleset)
    {
        /** @var Ruleset $newRuleset */
        $newRuleset = $ruleset->replicate();

        $newRuleset->ruleMatches()->sync([ ]);

        $newRuleset->save();

        foreach ( $ruleset->ruleMatches as $ruleMatch )
        {
            /** @var RuleMatch $ruleMatch */

            /** @var RuleMatch $newRuleMatch */
            $newRuleMatch = $ruleMatch->replicate();

            $newRuleMatch->save();

            $newRuleset->ruleMatches()->attach($newRuleMatch);
        }

        $newRuleset->save();

        return $newRuleset;
    }
}