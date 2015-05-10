<?php


namespace App\Repositories;

use App\Rule;
use App\RuleMatch;
use App\Ruleset;
use Illuminate\Database\Query\Builder;

class RulesetRepository {

    /**
     * @var RuleMatchRepository
     */
    private $matchRepository;

    /**
     * @var RuleRepository
     */
    private $ruleRepository;

    /**
     * @param RuleMatchRepository $matchRepository
     * @param RuleRepository      $ruleRepository
     */
    public function __construct(RuleMatchRepository $matchRepository, RuleRepository $ruleRepository)
    {
        $this->matchRepository = $matchRepository;
        $this->ruleRepository  = $ruleRepository;
    }

    /**
     * @param int $id
     * @return Ruleset
     */
    public function findById($id)
    {
        /** @var Ruleset $ruleset */
        $ruleset = Ruleset::find($id);

        return $ruleset;
    }

    /**
     * @param int   $id
     * @param array $data
     * @return Ruleset
     */
    public function update($id, array $data)
    {
        $ruleset = $this->findById($id);

        /** @var RuleMatch $ruleMatch */
        $ruleMatch = $this->findRuleMatchByCardId($ruleset->id, $data['card_id']);

        /** @var Rule $rule */
        $rule = $this->ruleRepository->findById($data['rule_id']);

        $ruleMatch->rule()->associate($rule);

        $ruleMatch->save();

        $ruleset->fresh();

        return $ruleset;
    }

    /**
     * @param int $rulesetId
     * @param int $cardId
     * @return RuleMatch
     */
    public function findRuleMatchByCardId($rulesetId, $cardId)
    {
        /** @var Rulematch $ruleMatch */
        $ruleMatch = RuleMatch::whereHas('ruleset', function (Builder $q) use ($rulesetId)
        {
            $q->where('id', '=', $rulesetId);
        })
                              ->whereHas('card', function (Builder $q) use ($cardId)
                              {
                                  $q->where('id', '=', $cardId);
                              })
                              ->first();

        return $ruleMatch;
    }
}