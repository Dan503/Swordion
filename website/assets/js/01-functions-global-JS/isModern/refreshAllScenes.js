//refresh all scenes
function refreshAllScenes() {
	$.each(G_allScenes, function(i, scene){
		scene.refresh();
	});
}
