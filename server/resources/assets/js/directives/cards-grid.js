/*globals angular*/
'use strict';

angular.module('CircleOfDeath.directives').directive('cardsGrid', function() {
    return {
        restrict: 'E',
        templateUrl: 'cards-grid.html'
    };
});
