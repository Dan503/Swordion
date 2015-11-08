// ScrollMagic initiation

var G_allScenes = [];

//allows for tracking progress without having to parse it in to functions
var progress = 0;

var phase = 0;

G_onResize.push(refreshAllScenes());

var G_ctrl = new ScrollMagic.Controller();

var G_homeSplash_animDuration = MQG_home_is_scrollAnimated ? (G_screen_borderedHeight * 0.5) + 50 : G_screen_borderedHeight * 1;

var G_autoScroll__isPlaying = false;
