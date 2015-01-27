/* This is a generated file. Do not edit *//* MediaMatch v.2.0.2 - Testing css media queries in Javascript. Authors & copyright (c) 2013: WebLinc, David Knight. */

//Allows old browsers to support enquire.min.js

window.matchMedia||(window.matchMedia=function(c){var a=c.document,w=a.documentElement,l=[],t=0,x="",h={},G=/\s*(only|not)?\s*(screen|print|[a-z\-]+)\s*(and)?\s*/i,H=/^\s*\(\s*(-[a-z]+-)?(min-|max-)?([a-z\-]+)\s*(:?\s*([0-9]+(\.[0-9]+)?|portrait|landscape)(px|em|dppx|dpcm|rem|%|in|cm|mm|ex|pt|pc|\/([0-9]+(\.[0-9]+)?))?)?\s*\)\s*$/,y=0,A=function(b){var z=-1!==b.indexOf(",")&&b.split(",")||[b],e=z.length-1,j=e,g=null,d=null,c="",a=0,l=!1,m="",f="",g=null,d=0,f=null,k="",p="",q="",n="",r="",k=!1;if(""===
b)return!0;do{g=z[j-e];l=!1;if(d=g.match(G))c=d[0],a=d.index;if(!d||-1===g.substring(0,a).indexOf("(")&&(a||!d[3]&&c!==d.input))k=!1;else{f=g;l="not"===d[1];a||(m=d[2],f=g.substring(c.length));k=m===x||"all"===m||""===m;g=-1!==f.indexOf(" and ")&&f.split(" and ")||[f];d=g.length-1;if(k&&0<=d&&""!==f){do{f=g[d].match(H);if(!f||!h[f[3]]){k=!1;break}k=f[2];n=p=f[5];q=f[7];r=h[f[3]];q&&(n="px"===q?Number(p):"em"===q||"rem"===q?16*p:f[8]?(p/f[8]).toFixed(2):"dppx"===q?96*p:"dpcm"===q?0.3937*p:Number(p));
k="min-"===k&&n?r>=n:"max-"===k&&n?r<=n:n?r===n:!!r;if(!k)break}while(d--)}if(k)break}}while(e--);return l?!k:k},B=function(){var b=c.innerWidth||w.clientWidth,a=c.innerHeight||w.clientHeight,e=c.screen.width,j=c.screen.height,g=c.screen.colorDepth,d=c.devicePixelRatio;h.width=b;h.height=a;h["aspect-ratio"]=(b/a).toFixed(2);h["device-width"]=e;h["device-height"]=j;h["device-aspect-ratio"]=(e/j).toFixed(2);h.color=g;h["color-index"]=Math.pow(2,g);h.orientation=a>=b?"portrait":"landscape";h.resolution=
d&&96*d||c.screen.deviceXDPI||96;h["device-pixel-ratio"]=d||1},C=function(){clearTimeout(y);y=setTimeout(function(){var b=null,a=t-1,e=a,j=!1;if(0<=a){B();do if(b=l[e-a])if((j=A(b.mql.media))&&!b.mql.matches||!j&&b.mql.matches)if(b.mql.matches=j,b.listeners)for(var j=0,g=b.listeners.length;j<g;j++)b.listeners[j]&&b.listeners[j].call(c,b.mql);while(a--)}},10)},D=a.getElementsByTagName("head")[0],a=a.createElement("style"),E=null,u="screen print speech projection handheld tv braille embossed tty".split(" "),
m=0,I=u.length,s="#mediamatchjs { position: relative; z-index: 0; }",v="",F=c.addEventListener||(v="on")&&c.attachEvent;a.type="text/css";a.id="mediamatchjs";D.appendChild(a);for(E=c.getComputedStyle&&c.getComputedStyle(a)||a.currentStyle;m<I;m++)s+="@media "+u[m]+" { #mediamatchjs { position: relative; z-index: "+m+" } }";a.styleSheet?a.styleSheet.cssText=s:a.textContent=s;x=u[1*E.zIndex||0];D.removeChild(a);B();F(v+"resize",C);F(v+"orientationchange",C);return function(a){var c=t,e={matches:!1,
media:a,addListener:function(a){l[c].listeners||(l[c].listeners=[]);a&&l[c].listeners.push(a)},removeListener:function(a){var b=l[c],d=0,e=0;if(b)for(e=b.listeners.length;d<e;d++)b.listeners[d]===a&&b.listeners.splice(d,1)}};if(""===a)return e.matches=!0,e;e.matches=A(a);t=l.push({mql:e,listeners:null});return e}}(window));
/*!
 * enquire.js v2.1.0 - Awesome Media Queries in JavaScript
 * Copyright (c) 2013 Nick Williams - http://wicky.nillia.ms/enquire.js
 * License: MIT (http://www.opensource.org/licenses/mit-license.php)
 */

 	  	// gives the ability to use JS media queries
		//more info: http://wicky.nillia.ms/enquire.js/


(function(t,i,n){var e=i.matchMedia;"undefined"!=typeof module&&module.exports?module.exports=n(e):"function"==typeof define&&define.amd?define(function(){return i[t]=n(e)}):i[t]=n(e)})("enquire",this,function(t){"use strict";function i(t,i){var n,e=0,s=t.length;for(e;s>e&&(n=i(t[e],e),n!==!1);e++);}function n(t){return"[object Array]"===Object.prototype.toString.apply(t)}function e(t){return"function"==typeof t}function s(t){this.options=t,!t.deferSetup&&this.setup()}function o(i,n){this.query=i,this.isUnconditional=n,this.handlers=[],this.mql=t(i);var e=this;this.listener=function(t){e.mql=t,e.assess()},this.mql.addListener(this.listener)}function r(){if(!t)throw Error("matchMedia not present, legacy browsers require a polyfill");this.queries={},this.browserIsIncapable=!t("only all").matches}return s.prototype={setup:function(){this.options.setup&&this.options.setup(),this.initialised=!0},on:function(){!this.initialised&&this.setup(),this.options.match&&this.options.match()},off:function(){this.options.unmatch&&this.options.unmatch()},destroy:function(){this.options.destroy?this.options.destroy():this.off()},equals:function(t){return this.options===t||this.options.match===t}},o.prototype={addHandler:function(t){var i=new s(t);this.handlers.push(i),this.matches()&&i.on()},removeHandler:function(t){var n=this.handlers;i(n,function(i,e){return i.equals(t)?(i.destroy(),!n.splice(e,1)):void 0})},matches:function(){return this.mql.matches||this.isUnconditional},clear:function(){i(this.handlers,function(t){t.destroy()}),this.mql.removeListener(this.listener),this.handlers.length=0},assess:function(){var t=this.matches()?"on":"off";i(this.handlers,function(i){i[t]()})}},r.prototype={register:function(t,s,r){var h=this.queries,u=r&&this.browserIsIncapable;return h[t]||(h[t]=new o(t,u)),e(s)&&(s={match:s}),n(s)||(s=[s]),i(s,function(i){h[t].addHandler(i)}),this},unregister:function(t,i){var n=this.queries[t];return n&&(i?n.removeHandler(i):(n.clear(),delete this.queries[t])),this}},new r});
//Allows numbers to count up

//http://inorganik.github.io/countUp.js/

function countUp(a,b,c,d,e,f){for(var g=0,h=["webkit","moz","ms","o"],i=0;i<h.length&&!window.requestAnimationFrame;++i)window.requestAnimationFrame=window[h[i]+"RequestAnimationFrame"],window.cancelAnimationFrame=window[h[i]+"CancelAnimationFrame"]||window[h[i]+"CancelRequestAnimationFrame"];window.requestAnimationFrame||(window.requestAnimationFrame=function(a){var c=(new Date).getTime(),d=Math.max(0,16-(c-g)),e=window.setTimeout(function(){a(c+d)},d);return g=c+d,e}),window.cancelAnimationFrame||(window.cancelAnimationFrame=function(a){clearTimeout(a)}),this.options=f||{useEasing:!0,useGrouping:!0,separator:",",decimal:"."},""==this.options.separator&&(this.options.useGrouping=!1),null==this.options.prefix&&(this.options.prefix=""),null==this.options.suffix&&(this.options.suffix="");var j=this;this.d="string"==typeof a?document.getElementById(a):a,this.startVal=Number(b),this.endVal=Number(c),this.countDown=this.startVal>this.endVal?!0:!1,this.startTime=null,this.timestamp=null,this.remaining=null,this.frameVal=this.startVal,this.rAF=null,this.decimals=Math.max(0,d||0),this.dec=Math.pow(10,this.decimals),this.duration=1e3*e||2e3,this.version=function(){return"1.3.1"},this.printValue=function(a){var b=isNaN(a)?"--":j.formatNumber(a);"INPUT"==j.d.tagName?this.d.value=b:this.d.innerHTML=b},this.easeOutExpo=function(a,b,c,d){return 1024*c*(-Math.pow(2,-10*a/d)+1)/1023+b},this.count=function(a){null===j.startTime&&(j.startTime=a),j.timestamp=a;var b=a-j.startTime;if(j.remaining=j.duration-b,j.options.useEasing)if(j.countDown){var c=j.easeOutExpo(b,0,j.startVal-j.endVal,j.duration);j.frameVal=j.startVal-c}else j.frameVal=j.easeOutExpo(b,j.startVal,j.endVal-j.startVal,j.duration);else if(j.countDown){var c=(j.startVal-j.endVal)*(b/j.duration);j.frameVal=j.startVal-c}else j.frameVal=j.startVal+(j.endVal-j.startVal)*(b/j.duration);j.frameVal=j.countDown?j.frameVal<j.endVal?j.endVal:j.frameVal:j.frameVal>j.endVal?j.endVal:j.frameVal,j.frameVal=Math.round(j.frameVal*j.dec)/j.dec,j.printValue(j.frameVal),b<j.duration?j.rAF=requestAnimationFrame(j.count):null!=j.callback&&j.callback()},this.start=function(a){return j.callback=a,isNaN(j.endVal)||isNaN(j.startVal)?(console.log("countUp error: startVal or endVal is not a number"),j.printValue()):j.rAF=requestAnimationFrame(j.count),!1},this.stop=function(){cancelAnimationFrame(j.rAF)},this.reset=function(){j.startTime=null,j.startVal=b,cancelAnimationFrame(j.rAF),j.printValue(j.startVal)},this.resume=function(){j.stop(),j.startTime=null,j.duration=j.remaining,j.startVal=j.frameVal,requestAnimationFrame(j.count)},this.formatNumber=function(a){a=a.toFixed(j.decimals),a+="";var b,c,d,e;if(b=a.split("."),c=b[0],d=b.length>1?j.options.decimal+b[1]:"",e=/(\d+)(\d{3})/,j.options.useGrouping)for(;e.test(c);)c=c.replace(e,"$1"+j.options.separator+"$2");return j.options.prefix+c+d+j.options.suffix},j.printValue(j.startVal)}
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

/*!
 * hoverIntent r7 // 2013.03.11 // jQuery 1.9.1+
 * http://cherne.net/brian/resources/jquery.hoverIntent.html
 *
 * You may use hoverIntent under the terms of the MIT license.
 * Copyright 2007, 2013 Brian Cherne
 */

	  	//use this if you are using a nav with a mega menu.
		//Used in the same way as the jQuery .hover() function.

(function(e){e.fn.hoverIntent=function(t,n,r){var i={interval:100,sensitivity:7,timeout:0};if(typeof t==="object"){i=e.extend(i,t)}else if(e.isFunction(n)){i=e.extend(i,{over:t,out:n,selector:r})}else{i=e.extend(i,{over:t,out:t,selector:n})}var s,o,u,a;var f=function(e){s=e.pageX;o=e.pageY};var l=function(t,n){n.hoverIntent_t=clearTimeout(n.hoverIntent_t);if(Math.abs(u-s)+Math.abs(a-o)<i.sensitivity){e(n).off("mousemove.hoverIntent",f);n.hoverIntent_s=1;return i.over.apply(n,[t])}else{u=s;a=o;n.hoverIntent_t=setTimeout(function(){l(t,n)},i.interval)}};var c=function(e,t){t.hoverIntent_t=clearTimeout(t.hoverIntent_t);t.hoverIntent_s=0;return i.out.apply(t,[e])};var h=function(t){var n=jQuery.extend({},t);var r=this;if(r.hoverIntent_t){r.hoverIntent_t=clearTimeout(r.hoverIntent_t)}if(t.type=="mouseenter"){u=n.pageX;a=n.pageY;e(r).on("mousemove.hoverIntent",f);if(r.hoverIntent_s!=1){r.hoverIntent_t=setTimeout(function(){l(n,r)},i.interval)}}else{e(r).off("mousemove.hoverIntent",f);if(r.hoverIntent_s==1){r.hoverIntent_t=setTimeout(function(){c(n,r)},i.timeout)}}};return this.on({"mouseenter.hoverIntent":h,"mouseleave.hoverIntent":h},i.selector)}})(jQuery)

//youtube iframe z-index fix (better to be done in backend code)

//ensures embeded youtube videos obay their z-index
$("iframe").length&&$("iframe").each(function(){var a=$(this).attr("src");b=-1===a.indexOf("?")?"?":"&";$(this).attr("src",a+b+"wmode=transparent")});//better to do this as back-end code

/**
 * @name		Shuffle Letters
 * @author		Martin Angelov
 * @version 	1.0
 * @url			http://tutorialzine.com/2011/09/shuffle-letters-effect-jquery/
 * @license		MIT License
 */

//Allows letters to have count up effect

(function(d){function l(a){var c="";"lowerLetter"==a?c="abcdefghijklmnopqrstuvwxyz0123456789":"upperLetter"==a?c="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789":"symbol"==a&&(c=",.?/\\(^)![]{}*&^%$#'\"");a=c.split("");return a[Math.floor(Math.random()*a.length)]}d.fn.shuffleLetters=function(a){var c=d.extend({step:8,fps:25,text:"",callback:function(){}},a);return this.each(function(){var a=d(this),h="";if(a.data("animated"))return!0;a.data("animated",!0);for(var h=c.text?c.text.split(""):a.text().split(""),
g=[],k=[],b=0;b<h.length;b++){var e=h[b];" "==e?g[b]="space":(/[a-z]/.test(e)?g[b]="lowerLetter":/[A-Z]/.test(e)?g[b]="upperLetter":g[b]="symbol",k.push(b))}a.html("");(function m(b){var f,d=k.length,e=h.slice(0);if(b>d)a.data("animated",!1),c.callback(a);else{for(f=Math.max(b,0);f<d;f++)e[k[f]]=f<b+c.step?l(g[k[f]]):"";a.text(e.join(""));setTimeout(function(){m(b+1)},1E3/c.fps)}})(-c.step)})}})(jQuery);
/*
 * Gives you full access to url attributes and parameters
 * documentation: https://github.com/allmarkedup/purl
 *
 * Purl (A JavaScript URL parser) v2.3.1
 * Developed and maintanined by Mark Perkins, mark@allmarkedup.com
 * Source repository: https://github.com/allmarkedup/jQuery-URL-Parser
 * Licensed under an MIT-style license. See https://github.com/allmarkedup/jQuery-URL-Parser/blob/master/LICENSE for details.
 */

(function(n){"function"===typeof define&&define.amd?define(n):window.purl=n()})(function(){function n(b,c){for(var a=decodeURI(b),a=s[c?"strict":"loose"].exec(a),d={attr:{},param:{},seg:{}},g=14;g--;)d.attr[t[g]]=a[g]||"";d.param.query=p(d.attr.query);d.param.fragment=p(d.attr.fragment);d.seg.path=d.attr.path.replace(/^\/+|\/+$/g,"").split("/");d.seg.fragment=d.attr.fragment.replace(/^\/+|\/+$/g,"").split("/");d.attr.base=d.attr.host?(d.attr.protocol?d.attr.protocol+"://"+d.attr.host:d.attr.host)+
(d.attr.port?":"+d.attr.port:""):"";return d}function u(b){b=b.tagName;return"undefined"!==typeof b?v[b.toLowerCase()]:b}function q(b,c,a,d){var g=b.shift();if(g){var e=c[a]=c[a]||[];if("]"==g)if(m(e))""!==d&&e.push(d);else if("object"==typeof e){c=b=e;a=[];for(var f in c)c.hasOwnProperty(f)&&a.push(f);b[a.length]=d}else c[a]=[c[a],d];else{~g.indexOf("]")&&(g=g.substr(0,g.length-1));if(!r.test(g)&&m(e))if(0===c[a].length)e=c[a]={};else{f={};for(var l in c[a])f[l]=c[a][l];e=c[a]=f}q(b,e,g,d)}}else m(c[a])?
c[a].push(d):c[a]="object"==typeof c[a]?d:"undefined"==typeof c[a]?d:[c[a],d]}function p(b){return w(String(b).split(/&|;/),function(c,a){try{a=decodeURIComponent(a.replace(/\+/g," "))}catch(d){}var b=a.indexOf("="),e;a:{for(var f=a.length,l,h=0;h<f;++h)if(l=a[h],"]"==l&&(e=!1),"["==l&&(e=!0),"="==l&&!e){e=h;break a}e=void 0}f=a.substr(0,e||b);e=a.substr(e||b,a.length);e=e.substr(e.indexOf("=")+1,e.length);""===f&&(f=a,e="");b=f;f=e;if(~b.indexOf("]")){var k=b.split("[");q(k,c,"base",f)}else{if(!r.test(b)&&
m(c.base)){e={};for(k in c.base)e[k]=c.base[k];c.base=e}""!==b&&(k=c.base,e=k[b],"undefined"===typeof e?k[b]=f:m(e)?e.push(f):k[b]=[e,f])}return c},{base:{}}).base}function w(b,c,a){for(var d=0,g=b.length>>0;d<g;)d in b&&(a=c.call(void 0,a,b[d],d,b)),++d;return a}function m(b){return"[object Array]"===Object.prototype.toString.call(b)}function h(b,c){1===arguments.length&&!0===b&&(c=!0,b=void 0);b=b||window.location.toString();return{data:n(b,c||!1),attr:function(a){a=x[a]||a;return"undefined"!==
typeof a?this.data.attr[a]:this.data.attr},param:function(a){return"undefined"!==typeof a?this.data.param.query[a]:this.data.param.query},fparam:function(a){return"undefined"!==typeof a?this.data.param.fragment[a]:this.data.param.fragment},segment:function(a){if("undefined"===typeof a)return this.data.seg.path;a=0>a?this.data.seg.path.length+a:a-1;return this.data.seg.path[a]},fsegment:function(a){if("undefined"===typeof a)return this.data.seg.fragment;a=0>a?this.data.seg.fragment.length+a:a-1;return this.data.seg.fragment[a]}}}
var v={a:"href",img:"src",form:"action",base:"href",script:"src",iframe:"src",link:"href",embed:"src",object:"data"},t="source protocol authority userInfo user password host port relative path directory file query fragment".split(" "),x={anchor:"fragment"},s={strict:/^(?:([^:\/?#]+):)?(?:\/\/((?:(([^:@]*):?([^:@]*))?@)?([^:\/?#]*)(?::(\d*))?))?((((?:[^?#\/]*\/)*)([^?#]*))(?:\?([^#]*))?(?:#(.*))?)/,loose:/^(?:(?![^:@]+:[^:@\/]*@)([^:\/?#.]+):)?(?:\/\/)?((?:(([^:@]*):?([^:@]*))?@)?([^:\/?#]*)(?::(\d*))?)(((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[?#]|$)))*\/?)?([^?#\/]*))(?:\?([^#]*))?(?:#(.*))?)/},
r=/^[0-9]+$/;h.jQuery=function(b){null!=b&&(b.fn.url=function(c){var a="";this.length&&(a=b(this).attr(u(this[0]))||"");return h(a,c)},b.url=h)};h.jQuery(window.jQuery);return h});


//Scroll To Me plugin

//source: https://gist.github.com/irae/351062

//usage: jQuery('#myId').scrollToMe([speed],[after animation funciton]);

//allows you to easily scroll to particular elements on the page


jQuery.fn.scrollToMe = function(speed,callFunc) {
	var that = $(this);
	//setTimeout(function() {
		var targetOffset = that.offset().top;
		//html for IE body for everything else
		$('html, body').animate({scrollTop: targetOffset}, speed || 500, callFunc);
	//},500);
	return this;
};


//!!DO NOT EDIT!!!
//document.ready opening (it will be correct in the merged js file)
jQuery(function($){

///*================================================*\
//	CONFIGURATION RELATED JS
//----------------------------------------------------
//	This file holds functions and variables that
//	give key measurements for other functions to use
//*================================================*/


///*================================================*\
//	BREAK POINTS
//----------------------------------------------------
//	Defines the points at which the page design
//	will snap and drastically change it's styles
//
//	!!!WARNING!!!
//	Ensure that these are always in synch with
//	the SASS break points:
//	/assets/sass/00-config-files/break-points.scss
//*================================================*/
var
bp_x_small = 350, //essentially iphones in portrait only

bp_small = 450,

bp_mobile = 600, //maximum for strict mobile view

bp_phablet = 770,

bp_tablet = 960,//maximum for tablets in portrait

bp_desktop = 1024,//point at which desktop content reaches the edge of of the screen

bp_large = 1200;//point at which desktop content reaches the edge of of the screen



/****************************************\
 Always know current screen width & height
\****************************************/

var screen_width = $(window).width();
var screen_height = $(window).height();

//determines how far down the screen animations start (0.66 = 66% down the screen)
var x_high_buffer = parseInt(screen_height * 0.25);
var high_buffer = parseInt(screen_height * 0.33);
var low_buffer = parseInt(screen_height * 0.66);
var x_low_buffer = parseInt(screen_height * 0.75);

$(window).resize(function(){
	screen_width = $(window).width();
	screen_height = $(window).height();

	x_high_buffer = parseInt(screen_height * 0.25);
	high_buffer = parseInt(screen_height * 0.33);
	low_buffer = parseInt(screen_height * 0.66);
	x_low_buffer = parseInt(screen_height * 0.75);
});



/****************************************\
   Allow time for css animations
   but only in browsers that support
   CSS3 animation
\****************************************/

function animation_time(time){
	if ($('html.csstransitions').length){
		return time;
	} else {
		return 0;
	};
}
//example usage:
/*
	setTimeout(function(){
		//script to carry out after css animation
	}, animation_time(500));
*/


/****************************************\
   IE safe version of preventDefault
\****************************************/
function preventDefault(e){
	(e.preventDefault) ? e.preventDefault() : e.returnValue = false;
}

//Not sure what this does. I think it prevents errors in browsers without a console... I think.
// usage: log('inside coolFunc', this, arguments);
window.log=function(){log.history=log.history||[];log.history.push(arguments);this.console&&(arguments.callee=arguments.callee.caller,console.log(Array.prototype.slice.call(arguments)))};
(function(b){function c(){}for(var d="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profileEnd,time,timeEnd,trace,warn".split(","),a;a=d.pop();)b[a]=b[a]||c})(window.console=window.console||{});


///*================================================*\
//	CONDITIONAL JS LOADER
//----------------------------------------------------
//	JS files that are loded onto the page only under
//	certain conditions will be loaded with this.
//	These files will be loaded first
//*================================================*/

	//JS root defined in html for easy build integration
	var plugin = js_root + 'plugins/conditional/';
	var segment = js_root + 'segments/conditional/';

	Modernizr.load([

/*********************************************\

	PLUGINS
==============================================
	Bits of code that you should never
	need to change that makes programing easier

\*******************************************/
	  {
		//respond allows IE 7 and 8 to use media queries
		//only use respond if absolutely necesary. We don't support mobile or tablet sized screens for IE7 and 8
	  	//test : $('html.lt-ie9').length,
		//yep  : [/*plugin + 'respond.min.js']
	  },
	  {
	  	//allows all browsers to use the placeholder attribute
	  	test : Modernizr.input.placeholder,
	    nope  : plugin + '_placeholders.min.js'
	  },
	  {
	  	//desktop lightbox plugin
	  	test : $('.js-lightbox-btn').length,
		yep  : [plugin + '_jquery.custombox.js'],
		callback : function (){
			$('.js-lightbox-btn').click(function(e){
				var scroll_position = scroll_pos;
				$.fn.custombox( this, {
			        effect: 'sign',
					eClose: '.close-info-btn',
					scrollbar: false,
					complete: function(){
						//needed for keyboard accessability.
						//Place a hidden button (id="anchor") at the top of the loaded content
						$(this.url).find('#anchor').focus();
					}
			    });
			    e.preventDefault();
			});
		}
	  },

	  /*****************************\
  			scroll based code
	  \*****************************/
	  {
	  	//allows for scroll based animations
		// SKROLLR WILL NOT WORK ON MOBILE/TABLET DEVICES
		// It is possible to get it to work... but the multistage animations won't work anymore if you do
		test: $(window).width() > bp_desktop,
	  	yep : plugin + '_skrollr.min.js',
	  	complete: function(){
	  		var s;
	  		if($(window).width() > bp_desktop){
				s = skrollr.init({forceHeight: false});
			}
	  	}
	  },


/*********************************************\

	SEGMENTS
==============================================
	large sections of code that are really
	only used in specific circumstances
	(eg. a home rotator)

\*******************************************/

	  {
	  	//General form Javascript
	  	test : $('input[type="browse"]').length || $('select').length,
	  	yep  : segment + '_form.js'
	  },
	  /*{
	  	//test if browser supports media queries
	  	test : Modernizr.mq('only all'),
	  	yep  : segment + '_media-queries.js'
	  },*/
	]);

/*================================================*\
	MAIN JS FILE
\*================================================*/

//Small bits and pieces of code go here.
//Write code here first, then turn it
//into a segment if it starts getting really big.

//=================================================


$('#equalTest div').equalHeights();

if ($('#element').length){

}


/**********************************************************************************\
  open PDFs, docs, external site links (start with http://), etc in a new window
\**********************************************************************************/

//Now includes google analytics integration

var file_types = ['pdf','doc','docx','xls','xlsx','ppt','pptx','txt','mp3'];
var image_types = ['jpg','gif','png'];

$('a:not([href^="javascript"])').each(function(i){
	var href = $(this).attr('href');

	if (typeof href !== 'undefined'){
	//for download links and image links
		var file_type = href.substr((href.lastIndexOf('.') +1)).toLowerCase();

		//if file type is in the accepted list of file types...
		if ($.inArray(file_type,file_types) > -1){
			$(this).addClass('download-link');

		//if file type is an image and is on a touch device
		} else if ($.inArray(file_type,image_types) > -1 && $('html').hasClass('touch')){
			$(this).addClass('image-link');
		};

	//Share links
		if (
			href.match("^http://www.linkedin.com") ||
			href.match("^http://twitter.com") ||
			href.match("^http://www.facebook.com")
		){
			$(this).addClass('share-link');
		};

	//podcast link
		if (href.match('^http://www.itunes.com')){
			$(this).addClass('podcast-link');
		};

	//External links
		if (
			href.match("^http") &&
			href.indexOf(window.location.host) === -1 &&
			!$(this).hasClass('share-link') &&
			!$(this).hasClass('podcast-link')
		){
			$(this).addClass('external-link');
		};

	};

	//once all links have been processed
	if (i == $('a:not([href^="javascript"])').length - 1){
		//any specific new window links get listed here
		var all_new_window_links = $('.download-link, .image-link, .external-link, .podcast-link');

		//Google analytics download tracking
		$('.download-link').click(function(){
			var url = $(this).attr('href');
			trackEvent('Download', 'click', url);
		});

		//Google analytics external link tracking
		$('.external-link').click(function(){
			var url = $(this).attr('href');
			trackEvent('Outbound', 'click', url);
		});

		//Google analytics external link tracking
		$('.podcast-link').click(function(){
			var url = $(this).attr('href');
			trackEvent('Podcast', 'click', url);
		});

		//Share link functionality and Google analytics tracking
		$('.share-link').each(function(){
			var url = $(this).attr('href');
			$(this).attr('href','javascript:void(0)').attr('data-href',url);
		}).click(function(){
			var url = $(this).attr('data-href');

			if ($(this).hasClass('twitter')){
				var window_name = "Share on Twitter";
				var width = 600;
				var height = 450;
				trackEvent('Twitter share', 'click', url);
			} else if ($(this).hasClass('linkedin')){
				var window_name = "Share on LinkedIn"
				var width = 600;
				var height = 500;
				trackEvent('LinkedIn share', 'click', url);
			} else if ($(this).hasClass('facebook')){
				var window_name = "Share on Facebook"
				var width = 600;
				var height = 500;
				trackEvent('Facebook share', 'click', url);
			}
			window.open(url,window_name,'scrollbars=yes,width='+width+',height='+height);
		});

		all_new_window_links.addClass("new-window").click(function(){window.open(this.href);return!1});
	}
});

//Code for tracking Google Analytics events
function trackEvent(category,action,label) {
	//".replace(/(\r\n|\n|\r)/gm,"")" removes any line breaks
	var eventCat = category.replace(/(\r\n|\n|\r)/gm,"").trim();
	var eventAct = action.replace(/(\r\n|\n|\r)/gm,"").trim().toLowerCase();
	var eventLabel = label.replace(/(\r\n|\n|\r)/gm,"").trim().toLowerCase();
    try {
        //ga('send', 'event', eventCat, eventAct, eventLabel); //Uncomment when Google Analytics has been incorporated into the site
        console.log("GA event = category: " + eventCat + ", action: " + eventAct + ", label: " + eventLabel);
		//return false; //uncomment to help with testing so you don't get redirected while testing GA code.
    } catch(err){}
}

	/******************************************************
		Prototype only code
	******************************************************/

	//gives an inactive class to navigation links that don't go anywhere
	$('#secondary-nav li a').each(function(){
		if ($(this).attr('href') == '#') {
			$(this).addClass('inactive');
		}
	});
	$('#primary-nav li a').each(function(){
		if ($(this).attr('href') == '#') {
			$(this).addClass('inactive');
		}
	});




/*================================================*\
	ANIMATION JS FILE
  ================================================

The JS file that handles staged and skrollr animations
for the website

\*=================================================*/


var scroll_pos = $(document).scrollTop();
var skrollr_max = $('body').height() - screen_height;

var animation_parent = '.js-view-based-animation';

///////////////////////////////////////
//   Multi-stage animation components  //
/////////////////////////////////////

//"multi_stage_animations" auto updates using the addStages function
var multi_stage_animations = $('.animate-once');
var single_stage_animations = $(animation_parent).not(multi_stage_animations);

//for adding timers to the addStages plugin
$.fn.addTimer = function(time, class_number, callback) {
	class_number = typeof class_number != 'undefined' ? class_number: 2;
	var _target = $(this);
	setTimeout(function(){
		_target.addClass('stage' + (class_number + 2));
		if (typeof callback != 'undefined'){
			callback.call(_target);
		}
	},time)
};

var counter_index = 0;

//adds stage2, stage3 etc. classes for every time parsed through an array through "stages"
$.fn.addStages = function(stages, callback, stage1callback) {
	stage1callback = typeof stage1callback != 'undefined' ? stage1callback: false;

	if (this.length) {
		multi_stage_animations = multi_stage_animations.add(this);
		var total = this.length;
		this.each(function(i){
			var _this = $(this);

			_this.attr('data-index',counter_index);

				_this.bind('activated', function(){
					if (_this.hasClass('activate')){
						if (stage1callback != false && !_this.hasClass('stage2')){
							stage1callback.call(_this);
						};
						for (x = 0; x < stages.length; x++) {
							_this.addTimer(stages[x],x,callback);
						}
					};
				});
		});
		counter_index ++;
	}
	return this;
};

//calls functions at specific stages
$.fn.stage = function(stage, callback) {
	if (
		this.hasClass( 'stage'+stage ) &&
		!$(this).hasClass( 'stage'+(stage+1) )
	){
		callback.call($(this));
	};
	return this;
};

//currently has space to fit 10 multistage animations on one page that use the countup plugin
var animation_counter = [[],[],[],[],[],[],[],[],[],[]];

$.fn.find_counters = function() {
	var counters = this.find('.js-count-up');
	var portion = this.attr('data-index');

	counters.each(function(){
		animation_counter[portion].push(parseInt($(this).attr('data-index')));
	});
	return this;
}

$.fn.findIndex = function(){
	return parseInt(this.attr('data-index'));
}

$('#ig-home-sme .man').each(function(i){
	//stage 3-11: the heads pop in using this code

	//the base starting time in milliseconds of when the animation chain starts
	var start_time = 700;

	//how long the delay is between each popin animation
	var delay = 75;

});


/********************************************************\

				MULTI STAGE ANIMATIONS

\********************************************************/

//Elements that have complex multi-stage animations
//all times are a refernce from the start of the animation
//you can add as many stages as you want, just keep adding higher and higher times to the array

//simple usage
$('#js-simpleExampleElement').addStages([

	//stage 1: [description] (animation activates when the element scrolls into view)

	//stage 2: [description]
	500,//stage 2 will occur 500 milliseconds after the animation activates

	//stage 3: [description]
	1000,//stage 3 will occur 1000 milliseconds after the animation activates

]);


//advanced usage
/*$('#js-advanced-example-element').addStages([
	//stage 1: [description]
	//stage 2: [description]
	250,
	//stage 3: [description]
	500,
	//stage 4: [description]
	1000,
	//stage 5: [description]
	1500,
],
	//for stages 2+
	function(){
		var index = $(this).findIndex();//finds out which animated element this is
		$(this)
		.find_counters()//finds the counters inside the element

		//only in stage 2...
		.stage(2,function(){
			startCounting(animation_counter[index][1]);// activate the 2nd counter
		})

		//only in stage 3...
		.stage(3,function(){
			setTimeout(function(){//delay for 500 milliseconds to allow the css animations to get a head start then...
				startCounting(animation_counter[index][2]);//activate the 3rd counter
			}, 500);
		})
	},

	//this is called as soon as the activate class is added... or you could just set the stage 2 timer to "0" for essentially the same effect
	function(){
		var index = $(this).findIndex();
		$(this).find_counters();
		startCounting(animation_counter[index][0]);//activate the first counter
	}
);*/


//////////////////////////////////////
// 			Rapid stages           //
////////////////////////////////////

//If you have a series animations being fired off rapidly that have evenly spaced delays, use this...

$.fn.rapidStages = function(repeated_element, beginning_stages, start_time, delay, final_stages, callback){

	var _this = this;
	var repeated_element = _this.find(repeated_element);

	var all_stages = beginning_stages;

	repeated_element.each(function(i){

		all_stages.push(start_time + (delay * i));

		if (i == repeated_element.length - 1) {
			//merge the final stages into the complete list
			$.merge(all_stages,final_stages);

			//add the stages when activated
			_this.addStages(all_stages,callback);
		}
	})
};


/* Usage:
//target the element that recieves the stages
$('#js-rapid-stage-example').rapidStages(

	//Define the repeated element that determines how many rapid stages there are
	'.js-rapid-stage-repeated-element',

	//stage 1: [description]

	[//place stages before the rapid animation in here:

		//stage 2: [description]
		500
	],

	1000,//the base starting time in milliseconds of when the animation chain starts
	75,//how long the delay is between each of the rapidly firing animations

	[//all stages after the rapid animation go here:

		//stage 12: [description]
		1250,

		//stage 13: [description]
		1500
	],
	function (){

		//callback function (optional) so you can define functions to fire at certain stages (same as the addStages callback)

		$(this)
		.stage(2,function(){
			//stage 2 function
		})

		.stage(7,function(){
			//stage 7 function
		})
	}
);*/


//adds popin stages for basic content
$('.js-popins').each(function(){
	if ($(this).find('.js-popins-piece') > 1){
		$(this).rapidStages('.js-popins-piece', [], 0, 200, []);
	}
});


//popin pieces
$('.js-popins').on('activated',function(i){
	var pieces = $(this).find('.js-popins-piece');
	var count = pieces.length;
	var increment = 100;
	if (count > 1){
		pieces.each(function(i){
			var _this = $(this);
			setTimeout(function(){
				_this.addClass('js-popins-piece--pop');
			}, (increment * i))
		});
	}
});


/////////////////////
// Counting stuff //
///////////////////

//http://inorganik.github.io/countUp.js/

var force_visible_counters = '';

var counting_options = {
  useEasing : true,
  useGrouping : true,
  separator : ',',
  decimal : '.',
  prefix : '',
  suffix : ''
}

var no_space_count_options = {
  useEasing : true,
  useGrouping : false,
  decimal : '.',
  prefix : '',
  suffix : ''
}

var counters = [];
var index = 0;

$('.count-up').each(function(i){
	if ($(this).closest(force_visible_counters).length){
		$(this).addClass('forced-visible');
	};

	if (!$(this).hasClass('forced-visible')){

		if ($(this).hasClass('no-space')){
			var options = no_space_count_options;
		} else {
			var options = counting_options;
		}

		var id = 'counter'+index;
		var value = parseInt($(this).text().replace(' ',''));

		$(this)
			.attr('id',id)
			.attr('data-value',value)
			.attr('data-index',index);

		if (multi_stage_animations.find($(this)).length){
			$(this).addClass('non-scroll');
		}
		var counter = new countUp(id, 0, value, 0, 2, options);
		counters.push(counter);

		index = index + 1;
	}
});

multi_stage_animations.find('.alpha-count').addClass('non-scroll');

function startCounting(variable){
	//if variable is a number
	if ($.isNumeric(variable)){
		$('#counter'+variable).addClass('activate').trigger('counting');
		counters[variable].start();

	//if variable is a string
	} else if (Object.prototype.toString.call(variable)){
		$(variable).addClass('activate').trigger('counting');
		var count_index = $(variable).attr('data-index');
		counters[count_index].start();

	//if variable is an object
	} else {
		variable.addClass('activate').trigger('counting');
		var count_index = variable.attr('data-index');
		counters[count_index].start();
	}
};

$.fn.alphaCount = function() {
	//disabled while shuffle letters plugin is disabled
	//this.addClass('activate').shuffleLetters();
};

//////////////////////////////////////////////////////////


//low_buffer defined in global variables
$.fn.inView = function(buffer) {
	var ac_seg = this.closest('.ac-segment');

	//will only activate if not in an accordion or when the accordion segment is open
	if (!ac_seg.length){
		var active = true;
	} else if (ac_seg.hasClass('expanded')){
		var active = true;
	} else {
		var active = false;
	}

	//condition ? value if true : value if false;
	return this.length && active == true ? scroll_pos > this.offset().top - buffer : false;
}

$.fn.activateInView = function(multi_stage, buffer) {

	//sets buffer and multi_stage defaults
	buffer = typeof buffer != 'undefined' ? buffer : low_buffer;
	multi_stage = typeof multi_stage != 'undefined' ? multi_stage : false;

	//for each item in the list
	this.each(function(){

		/*if ($(this).attr('id') == 'ig-home-also') {
			//set the last infographic buffer to the low buffer
			buffer = low_buffer;
		}*/

		//if it is in view
		if ($(this).inView(buffer)){
			// activate the animation
			$(this).not('.activate').addClass('activate').trigger('activated');
		} else {
			//if the animation does not have multiple stages
			if (!multi_stage_animations.filter($(this)).length){
				//play the animation backwards when you scroll up past it
				//doesn't work well with delayed animations
				$(this).filter('.activate').removeClass('activate');
			}
		}
	})
}

$.fn.reInitSkrollr = function() {
	if (screen_width > bp_tablet){
		$('#sidebar-scroller-progress')
		.removeAttr('data-0','height: 0%')
		.removeAttr('data-' + skrollr_max,'height: 100%');

		skrollr_max = $('body').height() - screen_height;

		$('#sidebar-scroller-progress')
		.attr('data-0','height: 0%')
		.attr('data-' + skrollr_max,'height: 100%');

		var n = skrollr.get();
		n.refresh();
	}
}

//list elements here that you want to activate on page load
$('.home .feature-programs').addClass('activate').trigger('activated');

////////////////////////////////////////////////
// Functions that are called while scrolling //
//////////////////////////////////////////////

$(window).scroll(function(){

	//adds and removes scrolling class for the sake of skrollr based animations
	$('html').addClass('scrolling')
	clearTimeout($.data(this, 'scrollTimer'));
    $.data(this, 'scrollTimer', setTimeout(function() {
		$('html').removeClass('scrolling');
    }, 250));

	//Resets scroll position variable for accurate
	scroll_pos = $(document).scrollTop();

	//list all elements that auto animate when they get in view here
	//usage: $('#element').activateInView([is it multistage? defaults to false], [adjust the buffer size from top of the screen, defaults to 2/3rds of screen height]);
	single_stage_animations.activateInView(false);
	multi_stage_animations.activateInView(true);
	$('.js-popins').activateInView(true,low_buffer);

	//activate scroll based count-ups when they come into view
	$('.count-up, .alpha-count').not('.activate, .non-scroll, .forced-visible').each(function(){
		if ($(this).inView(low_buffer)){
			if ($(this).hasClass('count-up')){
				startCounting($(this));
			} else {
				$(this).alphaCount();
			}
		}
	});
});

///////////////////////////////////////////////////////////////
//				Apply Skrollr HTML attributes here 			//
/////////////////////////////////////////////////////////////

/*$('#sidebar-scroller-progress')
	.attr('data-0','height: 0%')
	.attr('data-' + skrollr_max,'height: 100%');

$('.dots').each(function(){
	var height = parseInt($(this).outerHeight());
	var top = parseInt($(this).offset().top);
	var start =  top - low_buffer;
	var stop = 2 * height + start;

	$(this).find('.scroll-mask')
		.attr('data-' + start,'height: 0%')
		.attr('data-' + stop,'height: 100%');
});*/



//make any element take up the full screen height minus the optional subtracted element

$.fn.fullScreen = function(subtraction){
	var _this = this;

	function fillScreen(target){
		var windowHeight = $(window).height();
		var subtractionHeight =  typeof subtraction != 'undefined' ? $(subtraction).height() : 0;

		target.height(windowHeight - subtractionHeight);
	};

	fillScreen(_this);

	$(window).resize(function(){
		fillScreen(_this)
	});
}

$('.js-fullScreen').fullScreen('header');


//!!DO NOT EDIT!!!
//document.ready closing bracket (it will be correct in the merged js file)

});//end of document.ready function
