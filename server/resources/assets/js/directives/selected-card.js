/*globals angular*/
'use strict';

angular.module('CircleOfDeath.directives').directive('selectedCard', function() {
    return {
        restrict: 'E',
        templateUrl: 'selected-card.html'
    };
});
