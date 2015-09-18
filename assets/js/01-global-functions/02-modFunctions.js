
//module class manipulation

jQuery.fn.modAddClass = function(target, classSet) {
	classSet = defaultTo(classSet, moduleTargets[module]);
    this.addClass(Span(target, classSet));
    return this;
};

jQuery.fn.modRemoveClass = function(target, classSet) {
	classSet = defaultTo(classSet, moduleTargets[module]);
    this.removeClass(Span(target, classSet));
    return this;
};

jQuery.fn.modToggleClass = function(target, classSet) {
	classSet = defaultTo(classSet, moduleTargets[module]);
    this.toggleClass(Span(target, classSet));
    return this;
};

jQuery.fn.modHasClass = function(target, classSet) {
	classSet = defaultTo(classSet, moduleTargets[module]);
    return this.hasClass(Span(target, classSet));
};

jQuery.fn.modHasHook = function(target, classSet) {
	classSet = defaultTo(classSet, moduleTargets[module]);
	var hookString = this.attr('data-jshook');
    return hookString.indexOf(Span(target, classSet)) > 0;
};
