<?php


namespace App\Http\Controllers;

use App\Gameplay;
use App\Http\Responses\GameplayResponses;
use App\Repositories\GameplayRepository;

class GameplayController extends Controller {

    /**
     * @var GameplayResponses
     */
    private $respond;

    /**
     * @var GameplayRepository
     */
    private $repository;

    /**
     * @param GameplayResponses  $respond
     * @param GameplayRepository $repository
     */
    public function __construct(GameplayResponses $respond, GameplayRepository $repository)
    {
        $this->respond    = $respond;
        $this->repository = $repository;
    }

    public function show($id)
    {
        /** @var Gameplay $gameplay */
        $gameplay = $this->repository->findById($id);

        return $this->respond->show($gameplay);
    }

    /**
     * @return array
     */
    public function store()
    {
        /** @var Gameplay $gameplay */
        $gameplay = $this->repository->create();

        return $this->respond->create($gameplay);
    }
}