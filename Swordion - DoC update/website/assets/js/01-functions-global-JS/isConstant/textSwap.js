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

//will switch the visible text when it gets up to it in the time line
function textSwap(allText, text1, text2, method){
	method = defaultTo(method, 'slide')

	if (text1.is(':hidden')) {
		allText.not(text1).fadeOrSlide(method,'out');
		text1.fadeOrSlide(method,'in');

	} else if (text2.is(':hidden')) {
		allText.not(text2).fadeOrSlide(method,'out');
		text2.fadeOrSlide(method,'in');
	}
}
