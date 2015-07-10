
//module class manipulation

jQuery.fn.modAddClass = function(target) {
    this.addClass(Span(target));
    return this;
};

jQuery.fn.modRemoveClass = function(target) {
    this.removeClass(Span(target));
    return this;
};

jQuery.fn.modToggleClass = function(target) {
    this.toggleClass(Span(target));
    return this;
};

jQuery.fn.modHasClass = function(target) {
    return this.hasClass(Span(target));
};

jQuery.fn.modHasHook = function(target) {
	var hookString = this.attr('data-jshook');
    return hookString.indexOf(Span(target)) > 0;
};
