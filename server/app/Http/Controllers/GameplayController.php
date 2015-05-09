<?php namespace App\Http\Controllers

class GameplayController extends Controller {

	public function store(){
		$baseRuleset = Ruleset::find(1);
		$rulesetCopy-> $baseRuleset->replicate();
		$rulesetCopy->save();

		$gameplay = new Gameplay();
		$gameplay->ruleset_id = $rulesetCopy->id;
		$gameplay->save();

		//return gameplay id
	}
	
}