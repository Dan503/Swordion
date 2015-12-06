//http://stackoverflow.com/a/9039885/1611058

function is_iOS() {

  var iDevices = [
    'iPad Simulator',
    'iPhone Simulator',
    'iPod Simulator',
    'iPad',
    'iPhone',
    'iPod'
  ];

  while (iDevices.length) {
    if (navigator.platform === iDevices.pop()){ return true; }
  }

  return false;
}