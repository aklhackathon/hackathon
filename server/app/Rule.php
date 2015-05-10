<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rule
 *
 * @package App
 *
 * @property string    $description
 * @property integer   id
 * @property string    name
 */
class Rule extends Model {

    protected $fillable = [
        "name",
        "description",
    ];

}
