
var module_skipLinks = 'skipLinks';

module = module_skipLinks;

moduleTargets[module] = {
    //js hooks
	link : module+'__link',
	nextContentBlock : module+'__nextContentBlock',
	skipToNav : module+'__skipToNav',
	sideNav : module+'__sideNav',
	target : module+'__target'
};

$(Hook('nextContentBlock')).last().remove();

if (!$(Hook('sideNav')).length){
	$(Hook('skipToNav')).remove();
}

$(Hook('link')).scrollToTarget();