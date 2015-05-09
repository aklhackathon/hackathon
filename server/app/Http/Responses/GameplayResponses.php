<?php


namespace App\Http\Responses;

use App\Gameplay;
use App\Http\Transformers\GameplayTransformer;

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
     * @param GameplayTransformer $transformer
     */
    public function __construct(GameplayTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * @param Gameplay $gameplay
     * @return array
     */
    public function show(Gameplay $gameplay)
    {
        return $this->transformer->transform($gameplay);
    }

    /**
     * @param Gameplay $gameplay
     * @return array
     */
    public function create(Gameplay $gameplay)
    {
        return $this->transformer->transform($gameplay);
    }
}