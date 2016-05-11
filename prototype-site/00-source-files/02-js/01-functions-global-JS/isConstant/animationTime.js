/****************************************\
   Allow time for css animations
   but only in browsers that support
   CSS animations
\****************************************/

function animationTime(time){
	if (Modernizr.csstransitions){
		return time;
	} else {
		return 0;
	};
}
//example usage:
/*
	setTimeout(function(){
		//script to carry out after css animation
	}, animationTime(500));
*/
