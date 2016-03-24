jQuery.fn.scrollToTarget = function(settings) {
	this.click(function(e){
		preventDefault(e);
		jQuery(jQuery(this).attr('href')).scrollToMe(settings);
	});
	return this;
}

jQuery('a[href^="#"]').not('[data-jshook]').scrollToTarget();
