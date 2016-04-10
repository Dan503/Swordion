
<?php

//Function for easily adding content from the content folder

//setting the variable outside the function to improve performance
$GLOBALS['contentFiles'] = globFiles('/content','objects','*');

//$providedFileName needs to include extension eg. loadContent('main.php');
//$override can be an array or a string. If a string, it will refer  that forces it to look at another pages content

function loadContent($providedFileName, $override = null, $returnType = 'auto'){

	//The override parameter can be used to use content from a specific page or template
	if (isset($override)){

		//arrays are for pointing at specific pages
		if (is_array($override)){
			$getCurrent = get($override);

		//strings are for pointing at templates
		} elseif(is_string($override)){
			$getCurrent = ['template' => $override];
		}
	} else {
		$getCurrent = $GLOBALS['get']['current'];
	}

	$fileInfo = pathinfo($providedFileName);
	$fileType = $fileInfo['extension'];
	$fileName = $fileInfo['filename'];

	$possibleMatches = [$providedFileName];

	if ($fileType == 'img') {
		$possibleMatches = [
			$fileName.'.jpg',
			$fileName.'.png',
			$fileName.'.svg',
			$fileName.'.gif',
		];
	}

	//only include the server root if it is a php file
	$root = $fileType == 'php' ? $_SERVER['DOCUMENT_ROOT'] : '';

	$content = [];

	//for each file in the folder
	foreach ($GLOBALS['contentFiles'] as $contentFile){
		$folder = $contentFile['folderPath'];

		foreach($possibleMatches as $file){

			$filePath = $root.$folder.$file;


			//if looking at the correct file name
			if ($contentFile['fullName'] == $file){

				//if name of folder = current location string, use that file
				if ($folder == '/content/0-pages/'.$getCurrent['locationString'].'/'){
					array_push($content, $filePath);

				//else if name of file = current template name, use that file
				} elseif ($folder == '/content/1-templates/'.$getCurrent['template'].'/' ){
					array_push($content, $filePath);

				//else if name of file = current layout name, use that file
				} elseif ($folder == '/content/2-layouts/'.$getCurrent['layout'].'/' ){
					array_push($content, $filePath);
				}
			}
		}
	}


	//We only want to use the first match
	//this allows for a cascade effect of specificity
	$content = $content[0];

	//After going through all the content files once and not finding any matches, use the default version of the file
	foreach ($GLOBALS['contentFiles'] as $contentFile){
		$isDefaultFolder = $contentFile['folderPath'] == '/content/3-default/';

		foreach($possibleMatches as $file){
			$isCorrectFile = $contentFile['fullName'] == $file;

			if ($isCorrectFile && $isDefaultFolder){
				$default = $root.$contentFile['folderPath'].$file;
			}
		}
	}


	//if it's a php file output it as a page include
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
			return file_exists($_SERVER['DOCUMENT_ROOT'].$content) ? $content : $default;
		} else {
			return $default;
		}
	}

}

 ?>