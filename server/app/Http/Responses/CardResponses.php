<?php


namespace App\Http\Responses;

use App\Card;
use App\Http\Transformers\CardTransformer;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Sorskod\Larasponse\Larasponse;

/**
 * Class CardResponses
 *
 * @package Http\Responses
 */
class CardResponses {

    /**
     * @var CardTransformer
     */
    private $transformer;

    /**
     * @var Larasponse
     */
    private $respond;

    /**
     * @param Larasponse      $respond
     * @param CardTransformer $transformer
     */
    public function __construct(Larasponse $respond, CardTransformer $transformer)
    {
        $this->transformer = $transformer;
        $this->respond    = $respond;
    }

    /**
     * @param LengthAwarePaginator $cards
     * @return array
     */
    public function collection(LengthAwarePaginator $cards)
    {
        return $this->respond->paginatedCollection($cards, $this->transformer, 'cards');
    }

    /**
     * @param Card $card
     * @return array
     */
    public function show(Card $card)
    {
        return $this->respond->item($card, $this->transformer, 'card');
    }
}