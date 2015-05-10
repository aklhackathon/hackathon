<?php


namespace App\Http\Transformers;

use App\Rule;
use App\RuleMatch;
use League\Fractal\TransformerAbstract;

/**
 * Class RuleMatchTransformer
 *
 * @package Http\Transformers
 */
class RuleMatchTransformer extends TransformerAbstract {

    protected $availableIncludes = [
        'rule',
        'card',
    ];

    protected $defaultIncludes   = [
        'rule',
        'card',
    ];

    /**
     * @param RuleMatch $ruleMatch
     * @return array
     */
    public function transform(RuleMatch $ruleMatch)
    {
        return [
            'id' => $ruleMatch->id,
        ];
    }

    /**
     * @param RuleMatch $ruleMatch
     * @return \League\Fractal\Resource\Collection
     */
    public function includeRule(RuleMatch $ruleMatch)
    {
        /** @var RuleTransformer $transformer */
        $transformer = new RuleTransformer();

        /** @var Rule $rule */
        $rule = $ruleMatch->rule;

        return $this->item($rule, $transformer);
    }

    /**
     * @param RuleMatch $ruleMatch
     * @return \League\Fractal\Resource\Collection
     */
    public function includeCard(RuleMatch $ruleMatch)
    {
        /** @var CardTransformer $transformer */
        $transformer = new CardTransformer();

        /** @var Card $card */
        $card = $ruleMatch->card;

        return $this->item($card, $transformer);
    }
}