<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RuleMatch
 *
 * @property int id
 * @property Rule rule
 * @property Card card
 * @package App
 */
class RuleMatch extends Model {

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ruleset()
    {
        return $this->belongsTo(Ruleset::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rule()
    {
        return $this->belongsTo(Rule::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
