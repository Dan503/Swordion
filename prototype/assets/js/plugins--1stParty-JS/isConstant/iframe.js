
//youtube iframe z-index fix (better to be done in backend code)

//ensures embeded youtube videos obay their z-index
$("iframe").length&&$("iframe").each(function(){var a=$(this).attr("src");b=-1===a.indexOf("?")?"?":"&";$(this).attr("src",a+b+"wmode=transparent")});