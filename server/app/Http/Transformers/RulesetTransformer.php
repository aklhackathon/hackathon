<?php


namespace App\Http\Transformers;

use App\Ruleset;
use League\Fractal\TransformerAbstract;

/**
 * Class RulesetTransformer
 *
 * @package Http\Transformers
 */
class RulesetTransformer extends TransformerAbstract {

    /**
     * @param Ruleset $ruleset
     * @return array
     */
    public function transform(Ruleset $ruleset)
    {
        return $ruleset;
    }
}