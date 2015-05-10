/*globals angular*/
'use strict';

angular.module('CircleOfDeath.models').factory('Card', function() {

    function Card(config) {
        config = config || {};

        this.id = config.card.id;
        this.name = config.card.name;
        this.letter = config.card.letter;
        this.rank = config.card.rank;
        this.ruleId = config.rule.id;
        this.ruleName = config.rule.name;
        this.ruleDescription = config.rule.description;
    }

    return Card;
});
