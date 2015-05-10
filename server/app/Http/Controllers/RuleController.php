<?php


namespace App\Http\Controllers;

use App\Http\Responses\RuleResponses;
use App\Rule;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class RuleController
 *
 * @package App\Http\Controllers
 */
class RuleController extends Controller {

    /**
     * @var RuleResponses
     */
    private $respond;

    /**
     * @param RuleResponses $respond
     */
    public function __construct(RuleResponses $respond)
    {
        $this->respond = $respond;
    }

    /**
     * @return array
     */
    public function index()
    {
        /** @var Collection $rules */
        $rules = Rule::all();

        return $this->respond->collection($rules);
    }
}