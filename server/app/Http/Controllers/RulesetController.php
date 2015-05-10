<?php namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Http\Responses\RulesetResponses;
use App\Repositories\RulesetRepository;
use App\Ruleset;

/**
 * Class RulesetController
 *
 * @package App\Http\Controllers
 */
class RulesetController extends Controller {

    /**
     * @var RulesetResponses
     */
    private $respond;

    /**
     * @var RulesetRepository
     */
    private $repository;

    /**
     * @param RulesetResponses  $respond
     * @param RulesetRepository $repository
     */
    public function __construct(RulesetResponses $respond, RulesetRepository $repository)
    {
        $this->respond    = $respond;
        $this->repository = $repository;
    }

    /**
     * Get the details of a ruleset, including all of it's rule matches
     *
     * @param $id
     * @return array
     */
    public function show($id)
    {
        /** @var Ruleset $ruleset */
        $ruleset = $this->repository->findById($id);

        return $this->respond->show($ruleset);
    }

    /**
     * Customise a ruleset's rule match.
     *
     * In other words:
     * Given a ruleset_id and card_id, find the appropriate rule match and change the rule_id to another one.
     *
     * e.g.
     * POST
     *
     * /ruleset/:id
     *
     * Params:
     *
     * rule_id 20
     * card_id 4
     *
     * Will make customise the ruleset so that card_id 4 is set to rule_id 20.
     *
     * @param         $id
     * @param Request $request
     * @return Ruleset
     */
    public function update($id, Request $request)
    {
        /** @var Ruleset $ruleset */
        $ruleset = $this->repository->update($id, [
            'rule_id' => $request->get('rule_id'),
            'card_id' => $request->get('card_id'),
        ]);

        return $ruleset;
    }
}