/**
 * Equal Heights in Rows Plugin
 * Based off http://css-tricks.com/equal-height-blocks-in-rows/
 *
 * Usage: $(object).equalHeights();
 */

(function($){
	$.fn.equalHeights = function(target){
			target = $(this);
			target.height('auto');

			setTimeout(function(){//timeout helps ensure correct height is calculated
				var  currentTallest = 0,
				     currentRowStart = 0,
				     rowDivs = new Array(),
				     _this,
				     currentDiv,
				     topPosition = 0;

				 target.each(function(){
				 	var _this = $(this);
					topPosition = _this.position().top;

					 if (currentRowStart != topPosition) {
					     // we just came to a new row.  Set all the heights on the completed row
					     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
					       rowDivs[currentDiv].height(currentTallest);
					     }

					     // set the variables for the new row
					     rowDivs.length = 0; // empty the array
					     currentRowStart = topPosition;
					     currentTallest = _this.height();
					     rowDivs.push(_this);

					 } else {
					     // another div on the current row.  Add it to the list and check if it's taller
					     rowDivs.push(_this);
					     currentTallest = (currentTallest < _this.height()) ? (_this.height()) : (currentTallest);
					}

				  // do the last row
				   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
				     rowDivs[currentDiv].height(currentTallest);
				   }
				});
			},300);
	}
})(jQuery);
