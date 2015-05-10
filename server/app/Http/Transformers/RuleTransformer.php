<?php


namespace App\Http\Transformers;

use App\Rule;
use League\Fractal\TransformerAbstract;

/**
 * Class RuleTransformer
 *
 * @package Http\Transformers
 */
class RuleTransformer extends TransformerAbstract {

    /**
     * @param Rule $rule
     * @return array
     */
    public function transform(Rule $rule)
    {
        return [
            'id'          => $rule->id,
            'name'        => $rule->name,
            'description' => $rule->description
        ];
    }
}