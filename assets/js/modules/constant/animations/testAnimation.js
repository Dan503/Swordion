
$('.testAnimation').each(function(){
	var _this = $(this);

	var scene = new ScrollMagic.Scene({
		triggerElement: this
	})
	.on('enter',function(){

		_this.addStages({
			stages: [
				//stage 1 always triggers instantly
				0.5,//stage 2 triggers after 1 second
				1.2,//stage 3 triggers after 1.2 seconds
				2,//stage 4 triggers after 2 seconds
			],
			callback: function(stage){
				/*_this
				.stage(1,function(){
					console.log('does this work? (stage 1)');
				})
				.stage(2,function(){
					console.log('maybe (stage 2)');
				})
				.stage(3,function(){
					console.log('Lets see (stage 3)');
				});*/
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
			callback: function(stage){
				/*_this
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
				});*/
			}
		})
	})
	.addTo(ctrl);
});
