
//cookie functions
//mostly taken from here: (some alterations applied)
//http://stackoverflow.com/a/11344672/1611058

var Cookie = {
	//create a new cookie (origionally "bake_cookie", cute but less understandable)
	//name = string, values = json object
	write : function(name, value, expiry){
		//my own customisation
		var thisCookie = [
			name, '=', JSON.stringify(value),';',
			'path=/;',
			'expires=',expiry,';',
		].join('');

		document.cookie = thisCookie;
	},

	//turn an existing cookie into a json object
	read : function (name) {
		var result = document.cookie.match(new RegExp(name + '=([^;]+)'));
		result && (result = JSON.parse(result[1]));
		return result;
	},

	//safely update a cookie with only the values you want to change without losing existing values
	//name = string, values = json object
	update: function (name, newValues, expiry){
		var currentValues = defaultTo(Cookie.read(name), {});
		newValues = defaultTo(currentValues, newValues);
		Cookie.write(name, newValues, expiry);
	},

	//delete an existing cookie
	remove: function(name){
		document.cookie = [name, '=; expires=Thu, 01-Jan-1970 00:00:00 UTC; path=/;'].join('');
	}
}
