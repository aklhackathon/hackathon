/*globals angular*/
'use strict';

angular.module('CircleOfDeath.controllers').controller('LandingCtrl', function($scope, $http, Card) {
	var GAMEPLAY_API_ENDPOINT = './api/gameplay/1',
		_initFetchGameplay;

	// Init scope vars
	$scope.cards = [];
	$scope.state = 'in-progress';
	$scope.toggleSelectedInfo = false;
	$scope.selectedCard = null;

	$scope.showSelectedCard = function(cardId) {
		$scope.toggleSelectedInfo = true;

		angular.forEach($scope.cards, function(card) {
			if (card.id === cardId) {
				$scope.selectedCard = card;
			}
		});
	};

	$scope.hideSelectedCard = function() {
		if ($scope.toggleSelectedInfo) {
			$scope.toggleSelectedInfo = false;
			$scope.selectedCard = null;
		}
	};

	_initFetchGameplay = function() {
		$http.get(GAMEPLAY_API_ENDPOINT)
			.then(function(response) {
				angular.forEach(response.data.ruleset.rule_matches, function(ruleMatch) {
					$scope.cards.push(new Card(ruleMatch));
				});

				$scope.state = 'ready';
			})
			.catch(function() {
				// @todo handle error
			});
	};

	_initFetchGameplay();
});
