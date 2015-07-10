//http://stackoverflow.com/questions/2901102/how-to-print-a-number-with-commas-as-thousands-separators-in-javascript

function commafy( num){
    var parts = (''+ (num<0?-num:num)).split("."), s=parts[0], i=L= s.length, o='',c;
  while(i--){ o = (i==0?'':((L-i)%3?'':','))
                  +s.charAt(i) +o }
    return (num<0?'-':'') + o + (parts[1] ? '.' + parts[1] : '');
}