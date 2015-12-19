
$('.grid').each(function(){
	//simulates the flex box ability of giving things equal heights
	$(this).find(' > .grid__cell').matchHeight();

	//Makes cells with grid__inner classes take up the full height of the cell
	if ($(this).hasClass('grid--hasInners')){
		var this_cell = $(this).find(' > .grid__cell');
		this_cell.find(' > .grid__inner').height(this_cell.height());
	}
});

//Doesn't fix IE8 and IE9 not treating the right negative margin properly
//It's far less obvious with this though
//doing it in JS because nth-child won't work in IE8
for (var i = 0; i < 8; i++){
	$('[class*="grid--gutter-"].grid--cols-'+(i+1)+' > .grid-cell:nth-child('+(i+1)+'n)').css('border-right',0);
}


