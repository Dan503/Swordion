// ScrollMagic initiation

var G_allScenes = [];

//allows for tracking progress without having to parse it in to functions
var progress = 0;

var phase = 0;

G_onResizeStop.push(refreshAllScenes());

var G_ctrl = new ScrollMagic.Controller();

var G_autoScroll__isPlaying = false;
