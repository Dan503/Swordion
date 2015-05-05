
var gridWidths = [
	'full',
	'halves',
	'thirds',
	'quarters',
	'fiths',
	'sixths'
];

//simulates the flex box ability of giving things equal heights
$('.grid').each(function(){
	$(this).find(' > .grid-cell').matchHeight();
});

//Doesn't fix IE8 and IE9 not treating the right negative margin properly
//It's far less obvious with this though
$.each(gridWidths, function(i,value){
	$('[class*="grid--gutter-"].grid--'+value+' > .grid-cell:nth-child('+(i+1)+'n)').css('border-right',0);
});

