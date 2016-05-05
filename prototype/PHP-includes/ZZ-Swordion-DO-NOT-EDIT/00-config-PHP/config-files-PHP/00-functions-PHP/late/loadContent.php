
<?php

//Function for easily adding content from the content folder

//setting the variable outside the function to improve performance
$GLOBALS['contentFiles'] = globFiles('/content','objects','*');

//$fileName needs to include extension eg. loadContent('main.php');
//$override can be an array or a string. If a string, it will refer  that forces it to look at another pages content

function loadContent($providedFileName, $override = null, $returnType = 'auto'){

	//The override parameter can be used to grab content from a different page
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

	$content = null;
	$ext = [];

	$isTntervalFile = is_numeric($fileName);
	$defaultPath = '/content/3-default/';

	//for each file in the folder
	foreach ($GLOBALS['contentFiles'] as $contentFile){
		foreach($possibleMatches as $fileMatchName){
			if (!isset($content)){
				$folder = $contentFile['folderPath'];
				$file = $root.$folder.$fileMatchName;

				$isCorrectFolder = isCorrectFolder($folder, $getCurrent, $filePath);

				$isCorrectFileName = $contentFile['fullName'] == $fileMatchName;

				//if looking at the correct file name
				if ($isCorrectFileName && $isCorrectFolder){
					$content = $file;
				}
			}
		}
	}

	//After going through all the content files once, look through the default files
	foreach ($GLOBALS['contentFiles'] as $contentFile){
		$isDefaultFolder = $contentFile['folderPath'] == $defaultPath.$filePath;
		$isCorrectFolder = isCorrectFolder($contentFile['folderPath'], $getCurrent, $filePath);

		foreach($possibleMatches as $fileMatchName){
			$fullFilePath = $root.$contentFile['folderPath'].$fileMatchName;
			$isCorrectFile = $contentFile['fullName'] == $fileMatchName;
			$ext = pathinfo($fileMatchName)['extension'];
			$zeroFile = $root.$contentFile['folderPath'].'0.'.$ext;

			if (!isset($content)){
				if ($isTntervalFile){

					//assigns content to load the first item of a set if the called for item doesn't exist (eg. 4.php was requested but files only go up to 3.php)
					if ($isCorrectFolder && !$isCorrectFile){
						$content = $zeroFile;

					//if the set can't be found, it uses the default files
					} elseif ($isDefaultFolder && $isCorrectFile) {
						$content = $fullFilePath;

					//if the default files don't cover all the required items, use the first item in the default files in their place
					} elseif ($isDefaultFolder) {
						$content = file_exists($fullFilePath) ? $fullFilePath : $zeroFile;
					}

				//If not an interval file, and $content hasn't been defined yet, set content to be the content in the default folder
				} elseif($isDefaultFolder && $isCorrectFile)  {
					$content = $fullFilePath;
				}
			}
		}
	}

	//if it's a php file, output it as a page include by default
	if ($fileType == 'php' && $returnType == 'auto' || $returnType == 'include'){
		include $content;

	//if it's an image file it will be echoed by default
	} elseif ($fileType == 'img' && $returnType == 'auto' || $returnType == 'echo'){
		echo $content;

	//else just return with the path to the file
	} else {
		return $content;
	}

}

function isCorrectFolder($folder, $getCurrent, $filePath){
	$isPageFolder = $folder == '/content/0-pages/'.$getCurrent['locationString'].'/'.$filePath;
	$isTemplateFolder = $folder == '/content/1-templates/'.$getCurrent['template'].'/'.$filePath;
	$isLayoutFolder = $folder == '/content/2-layouts/'.$getCurrent['layout'].'/'.$filePath;

	return $isPageFolder || $isTemplateFolder || $isLayoutFolder;
}

 ?>