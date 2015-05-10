<?php


namespace App\Repositories;

use App\RuleMatch;

class RuleMatchRepository {

    /**
     * @param $id
     * @return RuleMatch
     */
    public function findById($id)
    {
        /** @var RuleMatch $ruleMatch */
        $ruleMatch = RuleMatch::find($id);

        return $ruleMatch;
    }
}