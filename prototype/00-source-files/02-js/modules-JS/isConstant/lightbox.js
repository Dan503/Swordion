
//Code that helps retain current scroll position when a lightbox closes (code may not be necessary)

var savedScrollPos = G_scrollPos;

$(document)
.on('opening', '[data-remodal-id]', function(){
	savedScrollPos = G_scrollPos;
})
.on('closing', '[data-remodal-id]', function (e) {
	screenFade('in',250);
	$('body').css({
		position: 'relative',
		top: -G_scrollPos,
	});
	scrollTo(savedScrollPos, {duration: 0});
})
.on('closed', '[data-remodal-id]', function (e) {
	setTimeout(function(){
		//console.log('closed');
		$('body, html').removeAttr('style');
		scrollTo(savedScrollPos, {duration: 0});
		setTimeout(function(){
			screenFade('out',250);
		}, 250)
	}, 0);
});
