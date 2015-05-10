<?php


namespace App\Http\Controllers;

use App\Gameplay;
use App\Http\Responses\GameplayResponses;
use App\Ruleset;
use App\Services\RulesetReplicator;

class GameplayController extends Controller {
    /**
     * @var GameplayResponses
     */
    private $respond;

    /**
     * @param GameplayResponses $respond
     */
    public function __construct(GameplayResponses $respond)
    {
        $this->respond = $respond;
    }

    public function show($id)
    {
        /** @var Gameplay $gameplay */
        $gameplay = Gameplay::findOrFail($id);

        return $this->respond->show($gameplay);
    }

    public function store()
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

        return $this->respond->create($gameplay);
    }
}