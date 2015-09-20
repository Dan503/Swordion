
//module class manipulation

function grabClasses (target, classSet){
	var allClasses = '';
//if an array, add all classes in one hit
	if ( target.constructor === Array){
		$.each(target, function(i, thisClass){
			var space = (i == 0) ? '' : ' ';
			allClasses = allClasses + space + Span(thisClass, classSet);
		});
//else just output the single class
	} else {
		allClasses = Span(target, classSet);
	};

	return allClasses;
}

jQuery.fn.modAddClass = function(target, classSet) {
	classSet = defaultTo(classSet, moduleTargets[module]);
	this.addClass(grabClasses(target, classSet));
    return this;
};

jQuery.fn.modRemoveClass = function(target, classSet) {
	classSet = defaultTo(classSet, moduleTargets[module]);
    this.removeClass(grabClasses(target, classSet));
    return this;
};

jQuery.fn.modToggleClass = function(target, classSet) {
	classSet = defaultTo(classSet, moduleTargets[module]);
    this.toggleClass(grabClasses(target, classSet));
    return this;
};

jQuery.fn.modHasClass = function(target, type, classSet) {
	classSet = defaultTo(classSet, moduleTargets[module]);

	type = defaultTo(type, 'and');

//if an array, check for all classes in one hit
	if ( target.constructor === Array){
		var allClasses = '';
		$.each(target, function(i, testClass){
			var seperator = '';
			if (type == 'or' && i != 0) {
				seperator = ', ';
			} else if (type == 'and' && i != 0) {
				seperator = (i == 0) ? '' : ' ';
			}
			allClasses = allClasses + seperator + Class(testClass, classSet);
		});
	    return this.is(allClasses);
//else just check for the single class
	} else {
		classSet = defaultTo(classSet, type);//this means you don't need to waste time defining a useless type variable

	    return this.hasClass(Span(target, classSet));
	};

};

jQuery.fn.modHasHook = function(target, classSet) {
	classSet = defaultTo(classSet, moduleTargets[module]);
	var hookString = this.attr('data-jshook');
    return hookString.indexOf(Span(target, classSet)) > 0;
};
