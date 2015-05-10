/*globals angular*/
'use strict';

angular.module('CircleOfDeath.directives').directive('gridCard', function() {
    return {
        restrict: 'E',
        replace: true,
        templateUrl: 'grid-card.html'
    };
});
