<?php


namespace App\Repositories;

use App\Gameplay;
use App\Ruleset;
use App\Services\RulesetReplicator;

class GameplayRepository {

    /**
     * @param int $id
     * @return Gameplay
     */
    public function findById($id)
    {
        /** @var Gameplay $gameplay */
        $gameplay = Gameplay::findOrFail($id);

        return $gameplay;
    }

    /**
     * @return Gameplay
     */
    public function create()
    {
        /** @var Ruleset $baseRuleset */
        $baseRuleset = Ruleset::find(1);

        $rulesetReplicator = new RulesetReplicator();

        /** @var Ruleset $ruleset */
        $ruleset = $rulesetReplicator->replicate($baseRuleset);

        /** @var Gameplay $gameplay */
        $gameplay = new Gameplay();
        $gameplay->ruleset()->associate($ruleset);
        $gameplay->save();

        return $gameplay;
    }
}