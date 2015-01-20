
var scroll_pos = $(document).scrollTop();
var skrollr_max = $('body').height() - screen_height;

var animation_parent = '.js-view-based-animation';

///////////////////////////////////////
//   Multi-stage animation components  //
/////////////////////////////////////

//"multi_stage_animations" auto updates using the addStages function
var multi_stage_animations = $('.animate-once');
var single_stage_animations = $(animation_parent).not(multi_stage_animations);

//for adding timers to the addStages plugin
$.fn.addTimer = function(time, class_number, callback) {
	class_number = typeof class_number != 'undefined' ? class_number: 2;
	var _target = $(this);
	setTimeout(function(){
		_target.addClass('stage' + (class_number + 2));
		if (typeof callback != 'undefined'){
			callback.call(_target);
		}
	},time)
};

var counter_index = 0;

//adds stage2, stage3 etc. classes for every time parsed through an array through "stages"
$.fn.addStages = function(stages, callback, stage1callback) {
	stage1callback = typeof stage1callback != 'undefined' ? stage1callback: false;

	if (this.length) {
		multi_stage_animations = multi_stage_animations.add(this);
		var total = this.length;
		this.each(function(i){
			var _this = $(this);

			_this.attr('data-index',counter_index);

				_this.bind('activated', function(){
					if (_this.hasClass('activate')){
						if (stage1callback != false && !_this.hasClass('stage2')){
							stage1callback.call(_this);
						};
						for (x = 0; x < stages.length; x++) {
							_this.addTimer(stages[x],x,callback);
						}
					};
				});
		});
		counter_index ++;
	}
	return this;
};

//calls functions at specific stages
$.fn.stage = function(stage, callback) {
	if (
		this.hasClass( 'stage'+stage ) &&
		!$(this).hasClass( 'stage'+(stage+1) )
	){
		callback.call($(this));
	};
	return this;
};

//currently has space to fit 10 multistage animations on one page that use the countup plugin
var animation_counter = [[],[],[],[],[],[],[],[],[],[]];

$.fn.find_counters = function() {
	var counters = this.find('.js-count-up');
	var portion = this.attr('data-index');

	counters.each(function(){
		animation_counter[portion].push(parseInt($(this).attr('data-index')));
	});
	return this;
}

$.fn.findIndex = function(){
	return parseInt(this.attr('data-index'));
}

$('#ig-home-sme .man').each(function(i){
	//stage 3-11: the heads pop in using this code

	//the base starting time in milliseconds of when the animation chain starts
	var start_time = 700;

	//how long the delay is between each popin animation
	var delay = 75;

});


/********************************************************\

				MULTI STAGE ANIMATIONS

\********************************************************/

//Elements that have complex multi-stage animations
//all times are a refernce from the start of the animation
//you can add as many stages as you want, just keep adding higher and higher times to the array

//simple usage
$('#js-simple-example-element').addStages([

	//stage 1: [description] (animation activates when the element scrolls into view)

	//stage 2: [description]
	500,//stage 2 will occur 500 milliseconds after the animation activates

	//stage 3: [description]
	1000,//stage 3 will occur 1000 milliseconds after the animation activates

]);


//advanced usage
/*$('#js-advanced-example-element').addStages([
	//stage 1: [description]
	//stage 2: [description]
	250,
	//stage 3: [description]
	500,
	//stage 4: [description]
	1000,
	//stage 5: [description]
	1500,
],
	//for stages 2+
	function(){
		var index = $(this).findIndex();//finds out which animated element this is
		$(this)
		.find_counters()//finds the counters inside the element

		//only in stage 2...
		.stage(2,function(){
			startCounting(animation_counter[index][1]);// activate the 2nd counter
		})

		//only in stage 3...
		.stage(3,function(){
			setTimeout(function(){//delay for 500 milliseconds to allow the css animations to get a head start then...
				startCounting(animation_counter[index][2]);//activate the 3rd counter
			}, 500);
		})
	},

	//this is called as soon as the activate class is added... or you could just set the stage 2 timer to "0" for essentially the same effect
	function(){
		var index = $(this).findIndex();
		$(this).find_counters();
		startCounting(animation_counter[index][0]);//activate the first counter
	}
);*/


//////////////////////////////////////
// 			Rapid stages           //
////////////////////////////////////

//If you have a series animations being fired off rapidly that have evenly spaced delays, use this...

$.fn.rapidStages = function(repeated_element, beginning_stages, start_time, delay, final_stages, callback){

	var _this = this;
	var repeated_element = _this.find(repeated_element);

	var all_stages = beginning_stages;

	repeated_element.each(function(i){

		all_stages.push(start_time + (delay * i));

		if (i == repeated_element.length - 1) {
			//merge the final stages into the complete list
			$.merge(all_stages,final_stages);

			//add the stages when activated
			_this.addStages(all_stages,callback);
		}
	})
};


/* Usage:
//target the element that recieves the stages
$('#js-rapid-stage-example').rapidStages(

	//Define the repeated element that determines how many rapid stages there are
	'.js-rapid-stage-repeated-element',

	//stage 1: [description]

	[//place stages before the rapid animation in here:

		//stage 2: [description]
		500
	],

	1000,//the base starting time in milliseconds of when the animation chain starts
	75,//how long the delay is between each of the rapidly firing animations

	[//all stages after the rapid animation go here:

		//stage 12: [description]
		1250,

		//stage 13: [description]
		1500
	],
	function (){

		//callback function (optional) so you can define functions to fire at certain stages (same as the addStages callback)

		$(this)
		.stage(2,function(){
			//stage 2 function
		})

		.stage(7,function(){
			//stage 7 function
		})
	}
);*/


//adds popin stages for basic content
$('.js-popins').each(function(){
	if ($(this).find('.js-popins__piece') > 1){
		$(this).rapidStages('.js-popins__piece', [], 0, 200, []);
	}
});


//popin pieces
$('.js-popins').on('activated',function(i){
	var pieces = $(this).find('.js-popins__piece');
	var count = pieces.length;
	var increment = 100;
	if (count > 1){
		pieces.each(function(i){
			var _this = $(this);
			setTimeout(function(){
				_this.addClass('js-popins__piece--pop');
			}, (increment * i))
		});
	}
});


/////////////////////
// Counting stuff //
///////////////////

//http://inorganik.github.io/countUp.js/

var force_visible_counters = '';

var counting_options = {
  useEasing : true,
  useGrouping : true,
  separator : ',',
  decimal : '.',
  prefix : '',
  suffix : ''
}

var no_space_count_options = {
  useEasing : true,
  useGrouping : false,
  decimal : '.',
  prefix : '',
  suffix : ''
}

var counters = [];
var index = 0;

$('.count-up').each(function(i){
	if ($(this).closest(force_visible_counters).length){
		$(this).addClass('forced-visible');
	};

	if (!$(this).hasClass('forced-visible')){

		if ($(this).hasClass('no-space')){
			var options = no_space_count_options;
		} else {
			var options = counting_options;
		}

		var id = 'counter'+index;
		var value = parseInt($(this).text().replace(' ',''));

		$(this)
			.attr('id',id)
			.attr('data-value',value)
			.attr('data-index',index);

		if (multi_stage_animations.find($(this)).length){
			$(this).addClass('non-scroll');
		}
		var counter = new countUp(id, 0, value, 0, 2, options);
		counters.push(counter);

		index = index + 1;
	}
});

multi_stage_animations.find('.alpha-count').addClass('non-scroll');

function startCounting(variable){
	//if variable is a number
	if ($.isNumeric(variable)){
		$('#counter'+variable).addClass('activate').trigger('counting');
		counters[variable].start();

	//if variable is a string
	} else if (Object.prototype.toString.call(variable)){
		$(variable).addClass('activate').trigger('counting');
		var count_index = $(variable).attr('data-index');
		counters[count_index].start();

	//if variable is an object
	} else {
		variable.addClass('activate').trigger('counting');
		var count_index = variable.attr('data-index');
		counters[count_index].start();
	}
};

$.fn.alphaCount = function() {
	//disabled while shuffle letters plugin is disabled
	//this.addClass('activate').shuffleLetters();
};

//////////////////////////////////////////////////////////


//screen_buffer defined in global variables
$.fn.inView = function(buffer) {
	var ac_seg = this.closest('.ac-segment');

	//will only activate if not in an accordion or when the accordion segment is open
	if (!ac_seg.length){
		var active = true;
	} else if (ac_seg.hasClass('expanded')){
		var active = true;
	} else {
		var active = false;
	}

	//condition ? value if true : value if false;
	return this.length && active == true ? scroll_pos > this.offset().top - buffer : false;
}

$.fn.activateInView = function(multi_stage, buffer) {

	//sets buffer and multi_stage defaults
	buffer = typeof buffer != 'undefined' ? buffer : low_buffer;
	multi_stage = typeof multi_stage != 'undefined' ? multi_stage : false;

	//for each item in the list
	this.each(function(){

		/*if ($(this).attr('id') == 'ig-home-also') {
			//set the last infographic buffer to the low buffer
			buffer = low_buffer;
		}*/

		//if it is in view
		if ($(this).inView(buffer)){
			// activate the animation
			$(this).not('.activate').addClass('activate').trigger('activated');
		} else {
			//if the animation does not have multiple stages
			if (!multi_stage_animations.filter($(this)).length){
				//play the animation backwards when you scroll up past it
				//doesn't work well with delayed animations
				$(this).filter('.activate').removeClass('activate');
			}
		}
	})
}

$.fn.reInitSkrollr = function() {
	if (screen_width > bp_tablet){
		$('#sidebar-scroller-progress')
		.removeAttr('data-0','height: 0%')
		.removeAttr('data-' + skrollr_max,'height: 100%');

		skrollr_max = $('body').height() - screen_height;

		$('#sidebar-scroller-progress')
		.attr('data-0','height: 0%')
		.attr('data-' + skrollr_max,'height: 100%');

		var n = skrollr.get();
		n.refresh();
	}
}

//list elements here that you want to activate on page load
$('.home .feature-programs').addClass('activate').trigger('activated');

////////////////////////////////////////////////
// Functions that are called while scrolling //
//////////////////////////////////////////////

$(window).scroll(function(){

	//adds and removes scrolling class for the sake of skrollr based animations
	$('html').addClass('scrolling')
	clearTimeout($.data(this, 'scrollTimer'));
    $.data(this, 'scrollTimer', setTimeout(function() {
		$('html').removeClass('scrolling');
    }, 250));

	//Resets scroll position variable for accurate
	scroll_pos = $(document).scrollTop();

	//list all elements that auto animate when they get in view here
	//usage: $('#element').activateInView([is it multistage? defaults to false], [adjust the buffer size from top of the screen, defaults to 2/3rds of screen height]);
	single_stage_animations.activateInView(false);
	multi_stage_animations.activateInView(true);
	$('.js-popins').activateInView(true,low_buffer);

	//activate scroll based count-ups when they come into view
	$('.count-up, .alpha-count').not('.activate, .non-scroll, .forced-visible').each(function(){
		if ($(this).inView(low_buffer)){
			if ($(this).hasClass('count-up')){
				startCounting($(this));
			} else {
				$(this).alphaCount();
			}
		}
	});
});

///////////////////////////////////////////////////////////////
//				Apply Skrollr HTML attributes here 			//
/////////////////////////////////////////////////////////////

/*$('#sidebar-scroller-progress')
	.attr('data-0','height: 0%')
	.attr('data-' + skrollr_max,'height: 100%');

$('.dots').each(function(){
	var height = parseInt($(this).outerHeight());
	var top = parseInt($(this).offset().top);
	var start =  top - low_buffer;
	var stop = 2 * height + start;

	$(this).find('.scroll-mask')
		.attr('data-' + start,'height: 0%')
		.attr('data-' + stop,'height: 100%');
});*/

