/******************************************\
   Easily move elements to new locations
\******************************************/

	//target is the location it is being moved to
	//action is the position in relation to the target that the element takes

	//app = append (add it to the end of the target),
	//prep = prepend (add to the beginning of the target),
	//before = before (place it just before the target),
	//after = after (place is straight after the target)

	$.fn.moveTo = function(target,action) {
		switch(action){
			case "prep": target.prepend(this); break;
			case "app": target.append(this); break;
			case "before": target.before(this); break;
			case "after": target.after(this); break;
			case "prep": target.prepend(this); break;
		}
	}
