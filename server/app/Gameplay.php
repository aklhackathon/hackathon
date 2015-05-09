<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Gameplay
 *
 * @package App
 *
 * @property string  code
 * @property Ruleset ruleset
 * @property integer id
 * @property User    created_at
 * @property User    updated_at
 * @property integer turn
 */
class Gameplay extends Model {

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ruleset()
    {
        return $this->belongsTo(Ruleset::class);
    }
}
