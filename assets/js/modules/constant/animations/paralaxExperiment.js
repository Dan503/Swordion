
var target = $('.siteContainer');

var colourShift =  new TimelineMax();

var colorShiftTL = colourShift

	//says if the animation is going from it's current styling to new styling or if it is going to the current position from an old one
	.to(

		//the element that is to be animated
		target,

		//in GSAP this is counted as seconds but in scroll magic, this acts more like a percentage value
		//1 + 0.5 = 1.5; 0.5 = 1.5 / 3; Therefore, this animation would go for 2/3 of the duration of the entire scroll animation duration
		1,

		// the styles and other settings you want to apply
		{ backgroundColor: '#EFCDFF' }
	)
	.set(target, { backgroundColor: '#000000' })//was being used to help debug and understand timings. "set" instantly sets stylings with no transition
	.to(
		target,
		0.5,
		{ backgroundColor: '#30BEFF' },

		// Determines the order things fire in.
		//1 = 100%. As in it would fire the animation just as the last one finishes.
		//You can fire things earlier than previous animations using "-=".
		//"-=1" would fire the animation earlier than the previous animation by the duration of the previous animation
		'1'
	)
	.set(target, { backgroundColor: '#ffffff' });


new ScrollMagic.Scene({
	//How long the duration of the scroll animation goes for. It's based on pixels, I recommend using $('.element').height()
	//the duration can also be defined as a percentage (eg. "50%"). The percentage is a percentage of the total screen **WINDOW** height.
    duration: 500,

	//determines the element that controls when the animations starts
	triggerElement: '.demo__multiGrad',

	//The default is that it activates when the top of the trigger element hits the center of the screen.
	//"onLeave" triggers when the top of the element hits the top of the screen.
	//"onEnter" triggers when the top of the element hits the botom of the screen.
	triggerHook: 'onLeave',

	//Tweak the starting location by a certain number of pixels
	offset: $('.demo__multiGrad').height() / 2
})
.setTween(colorShiftTL)
//.addIndicators()//to help with debugging
.addTo(ctrl);


