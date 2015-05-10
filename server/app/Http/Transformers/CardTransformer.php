<?php


namespace App\Http\Transformers;

use App\Card;
use League\Fractal\TransformerAbstract;

/**
 * Class CardTransformer
 *
 * @package Http\Transformers
 */
class CardTransformer extends TransformerAbstract {

    /**
     * @param Card $card
     * @return array
     */
    public function transform(Card $card)
    {
        return [
            'id'     => $card->id,
            'name'   => $card->name,
            'letter' => $card->letter,
            'rank'   => $card->rank
        ];
    }
}