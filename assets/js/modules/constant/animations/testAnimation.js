
$('.testAnimation').each(function(){
	var _this = $(this);

	var scene = new ScrollMagic.Scene({
		triggerElement: this
	})
	.on('enter',function(){

		_this.addStages({
			stages: [
				//stage 1 always triggers instantly
				1000,//stage 2 triggers at 1 second
				2000,//stage 3 triggers at 2 seconds
				3000,//stage 4 triggers at 3 seconds
			],
			callback: function(){
				_this
				.stage(1,function(){
					console.log('does this work? (stage 1)');
				})
				.stage(2,function(){
					console.log('maybe (stage 2)');
				})
				.stage(3,function(){
					console.log('Lets see (stage 3)');
				});
			}
		})

	})
	.addTo(ctrl);
});


$('.rapidTest').each(function(){
	var _this = $(this);

	var scene = new ScrollMagic.Scene({
		triggerElement: this
	})
	.addIndicators()
	.on('enter',function(){

		_this.rapidStages({
			repeatedElement:'.rapidTest-element',//element that is repeated
			callback: function(){
				_this
				.stage(1,function(){
					console.log('(stage 1)');
				})
				.stage(2,function(){
					console.log('(stage 2)');
				})
				.stage(3,function(){
					console.log('(stage 3)');
				})
				.stage(4,function(){
					console.log('(stage 4)');
				})
				.stage(5,function(){
					console.log('(stage 5)');
				});
			}
		})
	})
	.addTo(ctrl);
});
