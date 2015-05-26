/****************************************\
   Allow time for css animations
   but only in browsers that support
   CSS3 animation
\****************************************/

function animationTime(time){
	if ($('html.csstransitions').length){
		return time;
	} else {
		return 0;
	};
}
//example usage:
/*
	setTimeout(function(){
		//script to carry out after css animation
	}, animation_time(500));
*/
