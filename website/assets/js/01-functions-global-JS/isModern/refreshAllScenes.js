//refresh all scenes
function refreshAllScenes() {
	$.each(VG_allScenes, function(i, scene){
		scene.refresh();
	});
}
