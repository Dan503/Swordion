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