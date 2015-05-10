<?php


namespace App\Http\Responses;

use App\Http\Transformers\RuleTransformer;
use App\Rule;
use Illuminate\Database\Eloquent\Collection;
use Sorskod\Larasponse\Larasponse;

/**
 * Class RuleResponses
 *
 * @package Http\Responses
 */
class RuleResponses {

    /**
     * @var RuleTransformer
     */
    private $transformer;

    /**
     * @var Larasponse
     */
    private $response;

    /**
     * @param Larasponse      $response
     * @param RuleTransformer $transformer
     */
    public function __construct(Larasponse $response, RuleTransformer $transformer)
    {
        $this->transformer = $transformer;
        $this->response    = $response;
    }

    /**
     * @param Collection $rules
     * @return array
     */
    public function collection(Collection $rules)
    {
        return $this->response->collection($rules, $this->transformer, 'rules');
    }

    /**
     * @param Rule $rule
     * @return array
     */
    public function show(Rule $rule)
    {
        return $this->response->item($rule, $this->transformer, 'rule');
    }
}