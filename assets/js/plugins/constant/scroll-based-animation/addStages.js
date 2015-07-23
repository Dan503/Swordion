//calls functions at specific stages
$.fn.stage = function(stage, callback) {
	self = this;
	var currentStage = self.attr( 'data-current-stage');
	if ( currentStage == stage ){
		callback.call(self);
	};
	return self;
};

//for adding timers to the addStages plugin
$.fn.addTimer = function(settings) {
	settings = defaultTo(settings, { repeatedElement: false });

	var _this = this;
	setTimeout(function(){
		_this
			.addClass('stage-' + (settings.classNumber))
			.attr('data-current-stage',settings.classNumber);

		//remove the old current stage class then add the new one
		_this[0].className = _this[0].className.replace(/\bcurrentStage.[0-9]*\b/g, '');
		_this.addClass('currentStage-' + (settings.classNumber));

		if (settings.repeatedElement != false){
			$(settings.repeatedElement).eq(settings.classNumber - 1).addClass(settings.activationName);
		};
		if (settings.callback != false){
			settings.callback.call(_this, settings.classNumber);
		}
	},(settings.time * 1000))
};


//adds stage-1, stage-2, stage-3 etc. classes for every time parsed through the "stages" array
$.fn.addStages = function(settings, repeatedElement, activationName) {
	settings = defaultTo(settings, {
		startAt: 1,
		stages: [],
		callback: false,
		repeatedElement: false,
	});

	if (this.length && !this.hasClass('stage-1')) {
		var total = this.length;
		var _this = this;

		//adds a "0" at the front for stage-1
		settings.stages.unshift(0);

		_this.each(function(){
				$.each(settings.stages,function(i){
					_this.addTimer({
						time: settings.stages[i],
						classNumber: settings.startAt + i,
						callback: settings.callback,
						repeatedElement: repeatedElement,
						activationName: activationName
					});
				})
		 });
	}
	return this;
};

//////////////////////////////////////
// 			Rapid stages           //
////////////////////////////////////

//If you have a series animations being fired off rapidly that have evenly spaced delays, use this...

$.fn.rapidStages = function(settings){

	settings = defaultTo(settings, {
		startAt: 1, //determine which stage to start countin from
		repeatedElement: '> *',//the element that fires the rapid stages
		activationName: 'stage-element--isActivated',
		startStages: [],//timed stages before the rapid stages are added
		startTime: 0,//the time when the rapid stages start
		delay: 0.2,// the delay in seconds between each rapid stage
		endStages: [],//the timed stages that come after the rapid stages
		callback: false// the call back function that gets fired after each stage is added
	});

	var _this = this;
	var repeatedElement = _this.find(settings.repeatedElement);

	var allStages = settings.startStages;
	repeatedElement.each(function(i){

		allStages.push(settings.startTime + (settings.delay * i));

		if (isLastRound(i,repeatedElement)) {
			//merge the final stages into the complete list
			$.merge(allStages,settings.endStages);

			//add the stages when activated
			_this.addStages({
				startAt: settings.startAt,
				stages: allStages,
				callback: settings.callback
			}, repeatedElement, settings.activationName);
		}
	})
};

