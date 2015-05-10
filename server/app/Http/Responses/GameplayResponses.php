<?php


namespace App\Http\Responses;

use App\Gameplay;
use App\Http\Transformers\GameplayTransformer;
use Sorskod\Larasponse\Larasponse;

/**
 * Class GameplayResponses
 *
 * @package Http\Responses
 */
class GameplayResponses {

    /**
     * @var GameplayTransformer
     */
    private $transformer;

    /**
     * @var Larasponse
     */
    private $response;

    /**
     * @param GameplayTransformer $transformer
     * @param Larasponse          $response
     */
    public function __construct(GameplayTransformer $transformer, Larasponse $response)
    {
        $this->transformer = $transformer;
        $this->response    = $response;
    }

    /**
     * @param Gameplay $gameplay
     * @return array
     */
    public function show(Gameplay $gameplay)
    {
        return $this->response->item($gameplay, $this->transformer, 'gameplay');
    }

    /**
     * @param Gameplay $gameplay
     * @return array
     */
    public function create(Gameplay $gameplay)
    {
        return $this->response->item($gameplay, $this->transformer, 'gameplay');
    }
}