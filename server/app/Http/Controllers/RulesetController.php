<?php namespace App\Http\Controllers

class RulesetController extends Controller {

	//Save user customised ruleset
	public function update($id, Request $request){
		$ruleset = Ruleset::find($id);

		$ruleMatches = $ruleset->ruleMatches();
		
		$customRules = json_decode($request->get('ruleset'));
		foreach($ruleMatches as $match){
			foreach($customRules as $customRule){
				if($customRule['card_id'] == $match->card_id && $customRule['rule_id'] != $match->rule_id){
					$ruleset->ruleMatches()->detach($match);

					$ruleMatch = RuleMatch::where('card_id', $customRule['card_id'])->where('rule_id', $customRule['rule_id'])->first();

					if(!$ruleMatch){
						$newRuleMatch = new RuleMatch();
						$newRuleMatch->rule_id = $customRule['rule_id'];
						$newRuleMatch->card_id = $customRule['card_id'];

					    $ruleset->ruleMatches()->attach($newRuleMatch);
					    
					}else{
						$ruleset->ruleMatches()->attach($ruleMatch);
					}

					$ruleset->ruleMatches()->save();
				}				
			}
		}

		return $this->respond->create($ruleset);
	}	
}