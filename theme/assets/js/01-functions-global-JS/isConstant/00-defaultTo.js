function defaultTo(variable, default_value){
	//if it's an object, treat each setting in the object seperately
	if (typeof default_value === 'object' ){
		var paramObject = variable;
		var defaultParams = default_value
	    var finalParams = defaultParams;

		//http://adripofjavascript.com/blog/drips/default-parameters-in-javascript.html

	    // We iterate over each property of the paramObject
	    for (var key in paramObject) {
	        // If the current property wasn't inherited, proceed
	        if (paramObject.hasOwnProperty(key)) {
	            // If the current property is defined,
	            // add it to finalParams
	            if (paramObject[key] !== 'undefined') {
	                finalParams[key] = paramObject[key];
	            }
	        }
	    }

	    return finalParams;

	} else {
		//in all other cases completely relace the default value of the variable if a value is given 
		return typeof variable === 'undefined' ?  default_value : variable;
	}
}