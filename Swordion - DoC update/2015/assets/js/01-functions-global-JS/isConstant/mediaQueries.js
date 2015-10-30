function min(size) {
	if (bp.hasOwnProperty(size)){
		return VG_screen_width > (bp[size] + 1);
	} else {
		return VG_screen_width > (size + 1);
	}
}

function max(size){
	if (bp.hasOwnProperty(size)){
		return VG_screen_width < bp[size];
	} else {
		return VG_screen_width < size;
	}
}

function inside(wideSize, thinSize){

	if (bp.hasOwnProperty(thinSize) && bp.hasOwnProperty(wideSize)){
		return  (bp[thinSize] + 1) < VG_screen_width && VG_screen_width < bp[wideSize];

	} else if (!bp.hasOwnProperty(thinSize) && bp.hasOwnProperty(wideSize)) {
		return  (thinSize + 1) < VG_screen_width && VG_screen_width < bp[wideSize];

	} else if (bp.hasOwnProperty(thinSize) && !bp.hasOwnProperty(wideSize)) {
		return  (bp[thinSize] + 1) < VG_screen_width && VG_screen_width < wideSize;

	} else if (!bp.hasOwnProperty(thinSize) && !bp.hasOwnProperty(wideSize)) {
		return  (thinSize + 1) < VG_screen_width && VG_screen_width < wideSize;
	}
}

function outside(wideSize, thinSize){
	return !inside(wideSize, thinSize);
}