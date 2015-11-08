//lets you dynamically pick if you want to use jQueries slide or fade animation
$.fn.fadeOrSlide = function(method, inOrOut) {
	var _this = this;
	var functionality = {
		slide : {
			'in' : function(){
				 _this.slideDown();
			},
			'out' : function(){
				_this.slideUp();
			}
		},
		fade : {
			'in' : function(){
				 _this.fadeIn();
			},
			'out' : function(){
				_this.fadeOut();
			}
		}
	};
	functionality[method][inOrOut]();
}
