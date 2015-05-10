<?php


namespace App\Repositories;

use App\Rule;
use Illuminate\Database\Eloquent\Collection;

class RuleRepository {

    /**
     * @param int $id
     * @return Rule
     */
    public function findById($id)
    {
        /** @var Rule $rule */
        $rule = Rule::find($id);

        return $rule;
    }

    /**
     * @return Collection
     */
    public function all()
    {
        /** @var Collection $rules */
        $rules = Rule::all();

        return $rules;
    }
}