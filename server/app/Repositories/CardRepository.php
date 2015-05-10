<?php


namespace App\Repositories;

use App\Card;
use Illuminate\Database\Eloquent\Collection;

class CardRepository {

    /**
     * @param int $id
     * @return Card
     */
    public function findById($id)
    {
        /** @var Card $card */
        $card = Card::find($id);

        return $card;
    }

    /**
     * @return Collection
     */
    public function all()
    {
        /** @var Collection $cards */
        $cards = Card::orderBy('rank', 'asc')->get();

        return $cards;
    }
}