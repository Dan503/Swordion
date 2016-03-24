
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

function applyClassSet(classSet){
	if (typeof classSet == 'string'){
		return moduleTargets[classSet];
	} else {
		return defaultTo(classSet, moduleTargets[module]);
	}
}

//returns a CLASS (dot added) eg. ".module-element--modifier-JS"
var Class = function (key,classSet){
	classSet = applyClassSet(classSet);

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
	classSet = applyClassSet(classSet);
	return classSet[key];
};

//returns a HOOK (an attribute selector)
var Hook = function(key,classSet){

	classSet = applyClassSet(classSet);

	var selectorFull = '';
	var selectorFullArray = [];

	var hookPart = function(number, key){
		switch(number){
			/*case 0: var partial = '[data-jshook^="'+classSet[key]+' "]'; break;
			case 1: var partial = '[data-jshook*=" '+classSet[key]+' "]'; break;
			case 2: var partial = '[data-jshook$=" '+classSet[key]+'"]'; break;
			case 3: var partial = '[data-jshook="'+classSet[key]+'"]'; break;*/

			//simplified but less strict
			case 4: var partial = '[data-jshook*="'+classSet[key]+'"]'; break;
		}

		return partial;
	}

	var singleHook = function (key) {
		return hookPart(4,key);//hookPart(0,key)+','+hookPart(1,key)+','+hookPart(2,key)+','+hookPart(3,key);
	}

//if an array, merge into a single selector as an "or" statement
	if ( key.constructor === Array){
		$.each(key, function(i, string){
			var selectorPartial = '';
			//if inside a second array, merge them into an "and" statement
			if( string.constructor === Array) {
				$.each(string, function(x, finalString){
					selectorPartial = selectorPartial + hookPart(4,finalString);
				})
				selectorFullArray[i] = selectorPartial;
			} else {
				//or statement
				var comma = (i == 0) ? '' : ', ';
				selectorFull = selectorFull + comma + singleHook(string);
			}
		});
		$.each(selectorFullArray, function(index, string){
			var comma = (index == 0) ? '' : ', ';
			selectorFull = selectorFull + comma + string;
		})
//else just output a single copy of the selector
	} else {
		selectorFull = singleHook(key);
	};


	return selectorFull;
}

//returns an ID (hash added) eg. "#js-module-element"
var id = function (key,classSet){
	classSet = applyClassSet(classSet);

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

//FUNCTION DOESN'T WORK :(
//A quick way of filtering the media query object
//@param path = array of strings

/*
function mq(path){
	var query = moduleTargets[module].mq;
	$.each(path, function(i, d){
		query = query[d];
	});
	console.log(query());
	return query();
}
*/

/*
usage example:

moduleTargets[module] = {
    //js hooks
	//css classes

	//media querys
	mq : {
		//elements
		btn: {
			//states
			is_hidden: function(){ max(bp['mobile']) },
			not_hidden: function(){ min(bp['mobile']) },
		}
	}
};

module = module_name;
if (mq(['btn', 'is_hidden'])){
	//code
}

*/
