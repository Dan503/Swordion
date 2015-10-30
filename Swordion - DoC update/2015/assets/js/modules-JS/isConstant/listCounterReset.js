$('ol[start]').each(function() {
  var val = parseFloat($(this).attr("start")) - 1;
  $(this).css('counter-increment','li '+ val);
});