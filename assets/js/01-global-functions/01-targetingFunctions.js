
/*********************\
  TARGETING FUNCTIONS
\*********************/

//h = hook ([data-jshook="xxx"])
//c = class (".xxx")
//s = span ("xxx")
//id = id ("#xxx")


//sets up the default module targets variable that gets overwritten in every module
var module = '';
var moduleTargets = {};

//returns a CLASS (dot added) eg. ".module-element--modifier-JS"
var Class = function (key,classSet){
	classSet = defaultTo(classSet, moduleTargets[module]);

	var selectorFull = '';

	if ( key.constructor === Array){
		$.each(key, function(i, string){
			var comma = (i == 0) ? '' : ', ';
			selectorFull = selectorFull + comma + '.'+classSet[string];
		});
	} else {
		selectorFull = '.'+classSet[key];
	};

	return selectorFull;
}

//returns a SPAN (nothing added) eg. "module-element--modifier-JS"
//does not accept arrays
var Span = function (key,classSet){
	classSet = defaultTo(classSet, moduleTargets[module]);
	return classSet[key];
};

//returns a HOOK (an attribute selector)
var Hook = function(key,classSet){

	classSet = defaultTo(classSet, moduleTargets[module]);

	var selectorFull = '';

//if an array, merge into a single selector
	if ( key.constructor === Array){
		$.each(key, function(i, string){
			var comma = (i == 0) ? '' : ', ';
			selectorFull = selectorFull + comma + '[data-jshook^="'+classSet[string]+' "], [data-jshook*=" '+classSet[string]+' "], [data-jshook$=" '+classSet[string]+'"], [data-jshook="'+classSet[string]+'"]';
		});
//else just output a single copy of the selector
	} else {
		selectorFull = '[data-jshook^="'+classSet[key]+' "], [data-jshook*=" '+classSet[key]+' "], [data-jshook$=" '+classSet[key]+'"], [data-jshook="'+classSet[key]+'"]';
	};


	return selectorFull;
}

//returns an ID (hash added) eg. "#js-module-element"
var id = function (key,classSet){
	classSet = defaultTo(classSet, moduleTargets[module]);

	var selectorFull = '';

	if ( key.constructor === Array){
		$.each(key, function(i, string){
			var comma = (i == 0) ? '' : ', ';
			selectorFull = selectorFull + comma + '#'+classSet[string];
		});
	} else {
		selectorFull = '#'+classSet[key];
	};

	return selectorFull;
};


