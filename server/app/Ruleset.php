<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ruleset
 *
 * @package App
 */
class Ruleset extends Model {

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ruleMatches()
    {
        return $this->hasMany(RuleMatch::class);
    }
}