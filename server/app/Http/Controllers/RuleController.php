<?php


namespace App\Http\Controllers;

use App\Http\Responses\RuleResponses;
use App\Repositories\RuleRepository;
use App\Rule;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class RuleController
 *
 * @package App\Http\Controllers
 */
class RuleController extends Controller {

    /**
     * @var RuleResponses
     */
    private $respond;

    /**
     * @var RuleRepository
     */
    private $repository;

    /**
     * @param RuleResponses  $respond
     * @param RuleRepository $repository
     */
    public function __construct(RuleResponses $respond, RuleRepository $repository)
    {
        $this->respond    = $respond;
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function index()
    {
        /** @var Collection $rules */
        $rules = $this->repository->all();

        return $this->respond->collection($rules);
    }

    /**
     * @param $id
     * @return array
     */
    public function show($id)
    {
        /** @var Rule $rule */
        $rule = $this->repository->findById($id);

        return $this->respond->show($rule);
    }
}