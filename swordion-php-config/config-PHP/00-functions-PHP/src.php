<?php
//A function for easily referencing content image src paths

//usage:
//src('example','girl') >> '/assets/images/content/example/girl.jpg'
//src('example','boy','png') >> '/assets/images/content/example/boy.png'

	function src($folder, $fileName, $ext) {
		$basePath = '/assets/images/content/';
		$ext = isset($ext)? $ext : 'jpg';//default extension is.jpg
		return $basePath.$folder.'/'.$fileName.'.'.$ext;
	}

?>