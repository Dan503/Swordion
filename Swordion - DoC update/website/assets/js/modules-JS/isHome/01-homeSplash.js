
var module_homeSplash = 'homeSplash';

module = module_homeSplash;

moduleTargets[module] = {
    //js hooks
	stage : module+'__stage',
	number_left : module+'__number--left',
	number_right : module+'__number--right',
	slash : module+'__slash',
	scrollInstruction : module+'__scrollInstruction',
	intro : module+'__intro',

	menuBG : module+'__menuBG',
	searchBG : module+'__searchBG',
	wrapper : module+'__wrapper',

	igTriClone : module+'__igTriClone',

	//CSS classes
	wrapper_isHidden : module+'__wrapper--isHidden-JS',
};

jQuery(function($){

	module = module_homeSplash;

	var stage = $(Hook('stage'));
	var slider = $(Hook('slider'));

	if (stage.length){

		var animDuration = VG_homeSplash_animDuration;

		var headerTools_size = {
			L : min('tablet'),
			M : inside('tablet', 'mobile'),
			S : max('mobile')
		}

		if (headerTools_size['L']){
			var bgPositions = {
				menuBG : {
					top: '-46.3%',
					left: '-30%'
				},
				searchBG : {
					top: '-29%',
				},
				menuBG_before : {
					top: '-46.3%',
					left: '-30%'
				},
				searchBG_before : {
					top: '-29%',
				}
			}
		} else if (headerTools_size['M']) {
			var bgPositions = {
				menuBG : {
					top: '-55%',
					left: '-30%'
				},
				searchBG : {
					top: '-30%',
				},
				menuBG_before : {
					top: '-55%',
					left: '-30%'
				},
				searchBG_before : {
					top: '-30%',
				}
			}
		} else if (headerTools_size['S']) {
			var bgPositions = {
				menuBG : {
					top: '-63%',
					left: '-30%'
				},
				searchBG : {
					top: '-38%',
				},
				menuBG_before : {
					top: '-70%',
					left: '-30%'
				},
				searchBG_before : {
					top: '-45%',
				}
			}
		}

		var tween =  new TimelineMax();

		var stage = $(Hook('stage'));

		var scene = new ScrollMagic.Scene({
			duration: animDuration,
			offset: 0
		})
		.on('end',function(scroll){
			module = module_homeSplash;

			if (scroll.scrollDirection == "FORWARD") {
				$(Hook('wrapper'))
					.modAddClass('wrapper_isHidden');
				$('.headerTools')
					.addClass('headerTransform--transformLock-JS')
					.addClass('headerTransform--isTransformed-JS');
			} else {
				$(Hook('wrapper'))
					.modRemoveClass('wrapper_isHidden');
				$('.headerTools')
					.removeClass('headerTransform--transformLock-JS')
					.removeClass('headerTransform--isTransformed-JS');
			}

		})
		//.addIndicators({name: 'homeSplash'})//to help with debugging
		;

		if (MQG_home_is_scrollAnimated) {

			var desktopTL = tween
				.to(Hook('number_left'), 1, { top: '-75%', left: '75%', opacity: 0 })
				.to(Hook('scrollInstruction'), 0.5, { opacity: 0 }, '0')
				.to(Hook('number_right'), 1, { bottom: '-75%', right: '75%', opacity: 0 }, '0')
				.to(Hook('slash'), 1, { width: '0%', marginLeft: '50%', marginRight: '50%' }, '0')
				.to(Hook('menuBG'),	1, bgPositions['menuBG'], '0')
				.to(Hook('searchBG'), 1, bgPositions['searchBG'], '0')
				.set(Hook('igTriClone'),{ display: 'none' }, '-=0.2')
			;

			scene
				.setTween(desktopTL)
				.setPin(Hook('stage'))
		} else {

			var mobileTL = tween
				.to(Hook('number_left'), 1, { top: '-75%', left: '75%', opacity: 0 })
				.to(Hook('scrollInstruction'), 0.5, { opacity: 0 }, '0')
				.to(Hook('number_right'), 1, { bottom: '-75%', right: '75%', opacity: 0 }, '0')
				.to(Hook('slash'), 1, { width: '0%', marginLeft: '50%', marginRight: '50%' }, '0')
				.fromTo(Hook('menuBG'), 2, bgPositions['menuBG_before'], bgPositions['menuBG'], '0' )
				.fromTo(Hook('searchBG'), 2, bgPositions['searchBG_before'], bgPositions['searchBG'], '0')
				.set(Hook('igTriClone'),{ display: 'none' }, '-=0.2')
				.to(Hook('intro'), 0.5, { opacity: 0 }, '-=1')
				.set(Hook('intro'), { display: 'block' })
				.set(Hook('intro'), { display: 'none' })
			;

			scene
				.setTween(mobileTL)
		}

		scene.addTo(VG_ctrl)

		VG_allScenes.push(scene);
	}
});