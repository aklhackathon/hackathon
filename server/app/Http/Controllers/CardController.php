<?php


namespace App\Http\Controllers;

use App\Card;
use App\Http\Responses\CardResponses;
use App\Repositories\CardRepository;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class CardController
 *
 * @package App\Http\Controllers
 */
class CardController extends Controller {

    /**
     * @var CardResponses
     */
    private $respond;

    /**
     * @var CardRepository
     */
    private $repository;

    /**
     * @param CardResponses  $respond
     * @param CardRepository $repository
     */
    public function __construct(CardResponses $respond, CardRepository $repository)
    {
        $this->respond    = $respond;
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function index()
    {
        /** @var Collection $cards */
        $cards = $this->repository->all();

        return $this->respond->collection($cards);
    }

    /**
     * @param $id
     * @return array
     */
    public function show($id)
    {
        /** @var Card $card */
        $card = $this->repository->findById($id);

        return $this->respond->show($card);
    }
}