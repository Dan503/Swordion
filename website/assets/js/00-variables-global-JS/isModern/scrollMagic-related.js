// ScrollMagic initiation

var VG_allScenes = [];

//allows for tracking progress without having to parse it in to functions
var progress = 0;

var phase = 0;

VG_onResize.push(refreshAllScenes());

var VG_ctrl = new ScrollMagic.Controller();

var VG_homeSplash_animDuration = MQG_home_is_scrollAnimated ? (VG_screen_borderedHeight * 0.5) + 50 : VG_screen_borderedHeight * 1;

var VG_autoScroll__isPlaying = false;
