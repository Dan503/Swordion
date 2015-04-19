
//simulates the flex box ability that gives things equal heights
$('.grid--enableWrapping > .grid-cell').equalHeights();

//Doesn't fix IE8 and IE9 not treating the right negative margin properly
//It's far less obvious with this though
$('[class*="grid--gutter-"]').css({
	'border-left': 0,
	'margin-left': 0,
});
$.each(gridWidths, function(i,value){
	console.log(value);
	$('[class*="grid--gutter-"].grid--'+value+' > .grid-cell:nth-child('+(i+1)+'n)').css('border-right',0);
});

