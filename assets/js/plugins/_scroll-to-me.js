
//Scroll To Me plugin

//source: https://gist.github.com/irae/351062

//usage: jQuery('#myId').scrollToMe([speed],[after animation funciton]);

jQuery.fn.scrollToMe = function(speed,callFunc) {
	var that = $(this);
	//setTimeout(function() {
		var targetOffset = that.offset().top;
		//html for IE body for everything else
		$('html, body').animate({scrollTop: targetOffset}, speed || 500, callFunc);
	//},500);
	return this;
};
