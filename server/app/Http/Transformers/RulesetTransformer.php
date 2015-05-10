<?php


namespace App\Http\Transformers;

use App\Ruleset;
use Illuminate\Database\Eloquent\Collection;
use League\Fractal\TransformerAbstract;

/**
 * Class RulesetTransformer
 *
 * @package Http\Transformers
 */
class RulesetTransformer extends TransformerAbstract {

    protected $availableIncludes = [
        'rule_matches',
    ];

    protected $defaultIncludes   = [
        'rule_matches',
    ];

    /**
     * @param Ruleset $ruleset
     * @return array
     */
    public function transform(Ruleset $ruleset)
    {
        return [
            'id' => $ruleset->id,
        ];
    }

    /**
     * @param Ruleset $ruleset
     * @return \League\Fractal\Resource\Collection
     */
    public function includeRuleMatches(Ruleset $ruleset)
    {
        /** @var RulesetTransformer $transformer */
        $transformer = new RuleMatchTransformer();

        /** @var Collection $ruleMatches */
        $ruleMatches = $ruleset->ruleMatches;

        return $this->collection($ruleMatches, $transformer);
    }
}