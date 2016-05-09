
//Scroll To Me plugin

//source: https://gist.github.com/irae/351062

//usage: jQuery('#myId').scrollToMe();

//allows you to easily scroll to particular elements on the page

jQuery.fn.scrollToMe = function(settings) {
	var _this = this;
	settings = defaultTo(settings, {target: _this});
	//setTimeout(function() {
		if (_this.length){
			var targetScrollPos = _this.offset().top;
			//html for IE body for everything else
			scrollTo(targetScrollPos, settings)
		}
	//},500);
	return this;
};

var hash = window.location.hash;
if (hash.length){
	if (hash.indexOf('lightbox__') < 1){
		jQuery(window.location.hash).scrollToMe();
	}
}

//stops scroll animation if user uses scroll wheel
jQuery(window).on('mousewheel', function(){
	jQuery('html, body').stop();
	G_autoScroll__isPlaying = false;
});
