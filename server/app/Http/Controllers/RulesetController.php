<?php namespace App\Http\Controllers;

use App\Http\Responses\RulesetResponses;
use App\Repositories\RulesetRepository;
use App\Ruleset;

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
        $this->respond = $respond;
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return array
     */
    public function show($id)
    {
        /** @var Ruleset $ruleset */
        $ruleset = $this->repository->findById($id);

        return $this->respond->show($ruleset);
    }
//
//    //Save user customised ruleset
//    public function update($id, Request $request)
//    {
//        $ruleset = Ruleset::find($id);
//
//        $ruleMatches = $ruleset->ruleMatches();
//
//        $customRules = json_decode($request->get('ruleset'));
//        foreach ( $ruleMatches as $match )
//        {
//            foreach ( $customRules as $customRule )
//            {
//                if ( $customRule['card_id'] == $match->card_id && $customRule['rule_id'] != $match->rule_id )
//                {
//                    $ruleset->ruleMatches()->detach($match);
//
//                    $ruleMatch = RuleMatch::where('card_id', $customRule['card_id'])->where('rule_id', $customRule['rule_id'])->first();
//
//                    if ( ! $ruleMatch )
//                    {
//                        $newRuleMatch          = new RuleMatch();
//                        $newRuleMatch->rule_id = $customRule['rule_id'];
//                        $newRuleMatch->card_id = $customRule['card_id'];
//
//                        $ruleset->ruleMatches()->attach($newRuleMatch);
//                    }
//                    else
//                    {
//                        $ruleset->ruleMatches()->attach($ruleMatch);
//                    }
//
//                    $ruleset->ruleMatches()->save();
//                }
//            }
//        }
//
//        return $this->respond->create($ruleset);
//    }
}