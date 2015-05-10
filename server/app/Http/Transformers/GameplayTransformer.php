<?php


namespace App\Http\Transformers;

use App\Gameplay;
use App\Ruleset;
use League\Fractal\TransformerAbstract;

/**
 * Class GameplayTransformer
 *
 * @package Http\Transformers
 */
class GameplayTransformer extends TransformerAbstract {

    /**
     * @var array
     */
    protected $availableIncludes = [
        'ruleset',
    ];

    /**
     * @var array
     */
    protected $defaultIncludes = [
        'ruleset',
    ];

    /**
     * @param Gameplay $gameplay
     * @return array
     */
    public function transform(Gameplay $gameplay)
    {
        return [
            'id'   => $gameplay->id,
            'turn' => $gameplay->turn,
        ];
    }

    /**
     * @param Gameplay $gameplay
     * @return \League\Fractal\Resource\Item
     */
    public function includeRuleset(Gameplay $gameplay)
    {
        $transformer = new RulesetTransformer();

        /** @var Ruleset $ruleset */
        $ruleset = $gameplay->ruleset;

        return $this->item($ruleset, $transformer);
    }
}