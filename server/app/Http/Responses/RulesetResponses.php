<?php


namespace App\Http\Responses;

use App\Gameplay;
use App\Http\Transformers\RulesetTransformer;

/**
 * Class RulesetResponses
 *
 * @package Http\Responses
 */
class RulesetResponses {

    /**
     * @var RulesetTransformer
     */
    private $transformer;

    /**
     * @param RulesetTransformer $transformer
     */
    public function __construct(RulesetTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * @param Ruleset $ruleset
     * @return array
     */
    public function show(Ruleset $ruleset)
    {
        return $this->transformer->transform($ruleset);
    }

    /**
     * @param Ruleset $ruleset
     * @return array
     */
    public function create(Gameplay $ruleset)
    {
        return $this->transformer->transform($ruleset);
    }
}