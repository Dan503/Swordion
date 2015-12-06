
//simulates the flex box ability of giving things equal heights
$('.grid').each(function(){
	$(this).find(' > .grid__cell').matchHeight();
});

//Doesn't fix IE8 and IE9 not treating the right negative margin properly
//It's far less obvious with this though
//doing it in JS because nth-child won't work in IE8
for (var i = 0; i < 8; i++){
	$('[class*="grid--gutter-"].grid--cols-'+(i+1)+' > .grid-cell:nth-child('+(i+1)+'n)').css('border-right',0);
}


