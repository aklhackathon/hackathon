<?php namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ruleset
 *
 * @property Collection   ruleMatches
 * @property integer      id
 * @package App
 */
class Ruleset extends Model {

    /**
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ruleMatches()
    {
        return $this->belongsToMany(RuleMatch::class, 'ruleset_has_rule_matches');
    }
}