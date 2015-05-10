/*globals require*/
'use strict';

var angular = window.angular || angular;

// Set up angular component modules
angular.module('CircleOfDeath.controllers', []);
angular.module('CircleOfDeath.directives', []);
angular.module('CircleOfDeath.factories', []);
angular.module('CircleOfDeath.services', []);
angular.module('CircleOfDeath.routes', []);
angular.module('templates', []);

// Adding angular modules
require('./controllers/controllers');
require('./routes/routes');

// Adding Angular TemplateCache
require('./templates');

// Finally setup the app module
angular.module('CircleOfDeath', [
	'ngRoute',
	'CircleOfDeath.controllers',
	'CircleOfDeath.directives',
	'CircleOfDeath.factories',
	'CircleOfDeath.services',
	'CircleOfDeath.routes',
	'templates'
]).routes;


