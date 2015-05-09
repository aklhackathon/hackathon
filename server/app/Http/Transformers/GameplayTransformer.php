<?php


namespace App\Http\Transformers;

use App\Gameplay;
use League\Fractal\TransformerAbstract;

/**
 * Class GameplayTransformer
 *
 * @package Http\Transformers
 */
class GameplayTransformer extends TransformerAbstract {

    /**
     * @param Gameplay $gameplay
     * @return array
     */
    public function transform(Gameplay $gameplay)
    {
        return [
            'id'   => $gameplay->id,
            'turn' => $gameplay->turn,
        ];
    }
}