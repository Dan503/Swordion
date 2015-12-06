/****************************************\
   IE safe version of preventDefault
\****************************************/
function preventDefault(e){
	(e.preventDefault) ? e.preventDefault() : e.returnValue = false;
}
