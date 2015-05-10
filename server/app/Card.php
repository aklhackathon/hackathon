<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Card
 *
 * @package App
 *
 * @property string    name
 * @property string    letter
 * @property string    rank
 * @property Carbon    created_at
 * @property Carbon    updated_at
 * @property integer   id
 */
class Card extends Model {

    protected $fillable = [
        "name",
        "letter",
        "rank",
    ];

}
