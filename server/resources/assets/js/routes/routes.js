/*globals angular*/
'use strict';

angular.module('CircleOfDeath.routes').config(function($routeProvider, $locationProvider) {
    var ROOT = '/';

    $locationProvider.html5Mode({
        enabled: true,
        requireBase: false
    });

    $routeProvider
        .when(ROOT, {
            controller: 'LandingCtrl',
            templateUrl: 'landing/index.html'
        })
        .otherwise({
            // Redirect all undefined routes back to home
            redirectTo: ROOT
        });
});
