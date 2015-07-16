/******************************************\
   Easily move elements to new locations
\******************************************/

	//target is the location it is being moved to
	//action is the position in relation to the target that the element takes

	//append = add it to the end of the target,
	//prepend = add to the beginning of the target,
	//before = place it just before the target,
	//after = place is straight after the target

	$.fn.moveTo = function(target,action) {

		//if target is a span it will wrap it in the jQuery selector
		target = typeof target == 'string' ? $(target) : target;

		if (typeof target != 'undefined') {
			switch(action){
				case "prepend": target.prepend(this); break;
				case "before": target.before(this); break;
				case "after": target.after(this); break;
				default : target.append(this); break;//assumes you want to append by default
			}
		}

		return this;
	}
