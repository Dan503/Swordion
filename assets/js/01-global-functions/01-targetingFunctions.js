
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
	classSet = typeof classSet != 'undefined' ?  classSet : moduleTargets[module];
	return '.'+classSet[key];
}

//returns a SPAN (nothing added) eg. "module-element--modifier-JS"
var Span = function (key,classSet){
	classSet = typeof classSet != 'undefined' ?  classSet : moduleTargets[module];
	return classSet[key];
};

//returns a HOOK (an attribute selector)
var Hook = function(key,classSet){
	classSet = typeof classSet != 'undefined' ?  classSet : moduleTargets[module];
	return '[data-jshook^="'+classSet[key]+' "], [data-jshook*=" '+classSet[key]+' "], [data-jshook$=" '+classSet[key]+'"], [data-jshook="'+classSet[key]+'"]';
}

//returns an ID (hash added) eg. "#js-module-element"
var id = function (key,classSet){
	classSet = typeof classSet != 'undefined' ?  classSet : moduleTargets[module];
	return '#'+classSet[key];
};


