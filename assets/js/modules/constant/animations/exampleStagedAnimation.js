
$('#js-simpleExampleElement').each(function(){
	var _this = $(this);

	var scene = new ScrollMagic.Scene({
		triggerElement: this
	})
	.addIndicators()
	.on('enter',function(){
		module = module_popins;

		_this.addStages({
			stages: [
				//stage 1: First box fades in (animation activates when the element scrolls into view)

				//stage 2: 2nd box slides in from the right
				0.5,//stage 2 will occur 0.5 seconds after the animation activates

				//stage 3: 3rd box grows in
				1,//stage 3 will occur 1 second after the animation activates

				//stage 4: 4th box has a bit of a spin effect in
				0.75//it's preffereable to keep stages in order of occurance but you can give later stages smaller times than previous stages if needed when tweaking
			],
			callback: function(){
				_this
				.stage(1,function(){
					console.log('This function fires when the element comes into view (stage 1)');
				})
				.stage(3,function(){
					console.log('This function is not fired until stage 3');
				})
			}
		})
	})
	.addTo(ctrl);
});