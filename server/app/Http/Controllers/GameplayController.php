<?php


namespace App\Http\Controllers;

use App\Gameplay;
use App\Http\Responses\GameplayResponses;

class GameplayController extends Controller {

    /**
     * @var GameplayResponses
     */
    private $respond;

    /**
     * @param GameplayResponses $respond
     */
    public function __construct(GameplayResponses $respond)
    {
        $this->respond = $respond;
    }

    public function show($id)
    {
        /** @var Gameplay $gameplay */
        $gameplay = Gameplay::findOrFail($id);

        return $this->respond->show($gameplay);
    }
}