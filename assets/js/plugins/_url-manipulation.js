function getURL(){
	url = window.location.toString();
	return url;
}

//get the hash off the end of a string
$.getHash = function(a){
	//var href = getURL(); // example url
	var hash = $(this).split("#"); // split the string; usually there'll be only one # in an url so there'll be only two parts after the splitting
	var afterSplit = "Error parsing url";
	if(split[1] != null){
	    afterSplit = split[1];
		return hash;
	}
}

//plugin to obtain query string values
//usage $.getQuery["parameter"]
$.getQuery=function(a){if(""==a)return{};for(var d={},b=0;b<a.length;++b){var c=a[b].split("=");2==c.length&&(d[c[0]]=decodeURIComponent(c[1].replace(/\+/g," ")))}return d}(window.location.search.substr(1).split("&"));


//function for updating a query string with javascript
//(taken from http://stackoverflow.com/questions/5999118/add-or-update-query-string-parameter)
function updateQuery(key,value,url)
{if(!url)url=window.location.href;var re=new RegExp("([?&])"+key+"=.*?(&|#|$)(.*)","gi");if(re.test(url))if(typeof value!=="undefined"&&value!==null)return url.replace(re,"$1"+key+"="+value+"$2$3");else{var hash=url.split("#");url=hash[0].replace(re,"$1$3").replace(/(&|\?)$/,"");if(typeof hash[1]!=="undefined"&&hash[1]!==null)url+="#"+hash[1];return url}else if(typeof value!=="undefined"&&value!==null){var separator=url.indexOf("?")!==-1?"&":"?",hash=url.split("#");
url=hash[0]+separator+key+"="+value;if(typeof hash[1]!=="undefined"&&hash[1]!==null)url+="#"+hash[1];return url}else return url};