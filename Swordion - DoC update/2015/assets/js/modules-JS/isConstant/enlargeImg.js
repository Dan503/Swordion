//desktop code is handled by remodal lightbox code

var module_enlargeImg = 'enlargeImg';

module = module_enlargeImg;

moduleTargets[module] = {
    //js hooks
	trigger: module+'__trigger',
};

//if tablet or smaller, open image in a new tab
if(VG_screen_width <= bp['tablet']){

	$(Hook('trigger')).each(function(){
		$('[data-remodal-id="' + $(this).attr('href').substr(1) + '"]').remove();
	});

	$(Hook('trigger')).click(function(e){
		var img = $(this).find('img').attr('src');
		window.open(img);
	});

}

