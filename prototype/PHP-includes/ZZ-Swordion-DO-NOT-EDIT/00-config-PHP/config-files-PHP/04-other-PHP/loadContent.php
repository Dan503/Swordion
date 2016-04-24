
<?php

//Function for easily adding content from the content folder

//setting the variable outside the function to improve performance
$GLOBALS['contentFiles'] = globFiles('/content','objects','*');

//$fileName needs to include extension eg. loadContent('main.php');
//$override can be an array or a string. If a string, it will refer  that forces it to look at another pages content

function loadContent($providedFileName, $override = null, $returnType = 'auto'){

	//The override parameter can be used to use content from a differnt page
	$getCurrent = isset($override) ? get($override) : $GLOBALS['get']['current'];

	$fileInfo = pathinfo($providedFileName);
	$fileType = $fileInfo['extension'];
	$fileName = $fileInfo['filename'];
	$fullFileName = $fileInfo['basename'];
	$filePath = $fileInfo['dirname'] == '.' ? '' : $fileInfo['dirname'].'/';

	$possibleMatches = [$fullFileName];

	if ($fileType == 'img') {

		foreach($GLOBALS['supportedImgFormats'] as $i => $ext){
			$possibleMatches[$i] = $fileName.'.'.$ext;
		}
	}

	//only include the server root if it is a php file
	$root = $fileType == 'php' ? $_SERVER['DOCUMENT_ROOT'] : '';

	$content = [];
	$ext = [];

	$isTntervalFile = is_numeric($fileName);

	//for each file in the folder
	foreach ($GLOBALS['contentFiles'] as $contentFile){
		foreach($possibleMatches as $fileMatchName){

			$folder = $contentFile['folderPath'];
			$file = $root.$folder.$fileMatchName;

			$isCorrectFolder = isCorrectFolder($folder, $getCurrent, $filePath);

			$isCorrectFileName = $contentFile['fullName'] == $fileMatchName;

			//if looking at the correct file name
			if ($isCorrectFileName && $isCorrectFolder){
				array_push($content, $file);
			}
		}
	}

	//We only want to use the first match
	//this allows for a cascade effect of specificity
	$content = $content[0];

	$defaultPath = '/content/ZZ-default/';
	//After going through all the content files once, look through the default files
	foreach ($GLOBALS['contentFiles'] as $contentFile){
		$isDefaultFolder = $contentFile['folderPath'] == $defaultPath.$filePath;
		$isCorrectFolder = isCorrectFolder($contentFile['folderPath'], $getCurrent, $filePath);

		foreach($possibleMatches as $fileMatchName){
			$isCorrectFile = $contentFile['fullName'] == $fileMatchName;

			if ($isTntervalFile && $isCorrectFolder) {
				$ext = pathinfo($fileMatchName)['extension'];
				$zeroFile = $root.$contentFile['folderPath'].'0.'.$ext;
			} elseif ($isCorrectFile && $isDefaultFolder){
				$defaultFile = $root.$contentFile['folderPath'].$fileMatchName;
			}
		}
	}

	$default = defaultTo($zeroFile, $defaultFile);

	//if it's a php file, output it as a page include by default
	if ($fileType == 'php' && $returnType == 'auto' || $returnType == 'include'){
		//if content has been set, use that, else use the default content
		$return = file_exists($content) ? $content : $default;
		include $return;

	//if it's an image file it will be echoed by default
	} elseif ($fileType == 'img' && $returnType == 'auto' || $returnType == 'echo'){
		$return = file_exists($content) ? $content : $default;
		echo $return;

	//else just return with the path to the file (useful for images)
	} else {
		if (isset($content)){
			$contentFile = $fileType == 'php' ? $content : $_SERVER['DOCUMENT_ROOT'].$content;
			return file_exists($contentFile) ? $content : $default;
		} else {
			return $default;
		}
	}

}

function isCorrectFolder($folder, $getCurrent, $filePath){
	$isPageFolder = $folder == '/content/0-pages/'.$getCurrent['locationString'].'/'.$filePath;
	$isTemplateFolder = $folder == '/content/1-templates/'.$getCurrent['template'].'/'.$filePath;
	$isLayoutFolder = $folder == '/content/2-layouts/'.$getCurrent['layout'].'/'.$filePath;

	return $isPageFolder || $isTemplateFolder || $isLayoutFolder;
}

 ?>