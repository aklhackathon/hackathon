<?php


namespace App\Http\Responses;

use App\Http\Transformers\RulesetTransformer;
use App\Ruleset;
use Sorskod\Larasponse\Larasponse;

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
     * @var Larasponse
     */
    private $respond;

    /**
     * @param Larasponse         $respond
     * @param RulesetTransformer $transformer
     */
    public function __construct(Larasponse $respond, RulesetTransformer $transformer)
    {
        $this->respond     = $respond;
        $this->transformer = $transformer;
    }

    /**
     * @param Ruleset $ruleset
     * @return array
     */
    public function show(Ruleset $ruleset)
    {
        return $this->respond->item($ruleset, $this->transformer);
    }

    /**
     * @param Ruleset $ruleset
     * @return array
     */
    public function create(Ruleset $ruleset)
    {
        return $this->respond->item($ruleset, $this->transformer);
    }
}