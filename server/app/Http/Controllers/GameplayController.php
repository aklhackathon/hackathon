<?php


namespace App\Http\Controllers;

use App\Gameplay;
use App\Http\Responses\GameplayResponses;
use App\Ruleset;

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

        /** @var Ruleset $ruleset */
        $ruleset = $baseRuleset->replicate();
        $ruleset->save();

        /** @var Gameplay $gameplay */
        $gameplay = new Gameplay();
        $gameplay->ruleset()->associate($ruleset);
        $gameplay->save();

        return $this->respond->create($gameplay);
    }
}