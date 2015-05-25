

<?php /*

just add this where you want the breadcrumb to go and it will do the rest! :)
<?php include($_SERVER['DOCUMENT_ROOT']."/breadcrumb.php"); ?>

!!!WARNING!!! This does NOT accept folders with no index files. It will break it.

This is a php plug-in taken from this site: http://www.mindpalette.com/archives/php-breadcrumbs/

(I have made slight alterations to it, one alteration is that it now expects to find the internal pages in a "pages" folder)

*/?>



<?php

$convert_toSpace = true; // true if script should convert _ and - in folder names to spaces
$upperCaseWords = true;	// true if script should convert lowercase to initial caps
$topLevelName = "Home";	// name of home/root directory
$separator = "";		// characters(s) to separate links in hierarchy (default is no separator)

// find index page in directory...
function MPBCDirIndex($dir) {
	$index = '';
	@$dir_handle = opendir($dir);

	if ($dir_handle) {
		while ($file = readdir($dir_handle)) {
			$test = substr(strtolower($file), 0, 6);
			if ($test == 'index.') {
				$index = $file;
				break;
			}
		}
		return $index;
	}
}

// make clean array (trim entries and remove blanks)...
function MPBCTrimArray($array) {
	$clean = array();
	for ($n=0; $n<count($array); $n++) {
		$entry = trim($array[$n]);
		if ($entry != '') $clean[] = $entry;
		}
	return $clean;
}

// function to prep string folder names if needed...
function MPBCFixNames($string) {
	global $convert_toSpace;
	global $upperCaseWords;
	if ($convert_toSpace) $string = str_replace('-', ' ', $string);
	if ($upperCaseWords) $string = ucwords($string);
	return $string;
}

$server = (isset($_SERVER)) ? $_SERVER : $HTTP_SERVER_VARS;

$htmlRoot = (isset($server['DOCUMENT_ROOT'])) ? $server['DOCUMENT_ROOT'] : '';
if ($htmlRoot == '') $htmlRoot = (isset($server['SITE_HTMLROOT'])) ? $server['SITE_HTMLROOT'] : '';

$pagePath = (isset($server['SCRIPT_FILENAME'])) ? $server['SCRIPT_FILENAME'] : '';
if ($pagePath == '') $pagePath = (isset($server['SCRIPT_FILENAME'])) ? $server['SCRIPT_FILENAME'] : '';

$httpPath = ($htmlRoot != '/') ? str_replace($htmlRoot, '', $pagePath) : $pathPath;

$dirArray = explode('/', $httpPath);
if (!is_dir($htmlRoot.$httpPath)) $dirArray = array_slice($dirArray, 0, count($dirArray) - 1);

$linkArray = array();
$thisDir = '';
$baseDir = ($htmlRoot == '') ? '' : $htmlRoot;


//Custom addition: Removes the "pages" folder from the array ("pages" is always the 2nd item in the array)
unset($dirArray[1]);
$dirArray = array_values($dirArray);


for ($n=0; $n<count($dirArray); $n++) {
	$thisDir .= $dirArray[$n].'/';
	$thisIndex = MPBCDirIndex($htmlRoot."/pages".$thisDir);
	$thisText = ($n == 0) ? $topLevelName : MPBCFixNames($dirArray[$n]);

	if ($n != 0 && $thisIndex == ''){
		//Generates a non-link item for folders with no index file
		$thisLink =
		'<li class="breadcrumb-item breadcrumb-item--blank">
			<span class="breadcrumb-inner breadcrumb-inner--blank">
				'.$thisText.'
			</span>
		</li>';
	} else if ($n == count ($dirArray) - 1) {
		//Generates a non-link item for the current page
		$thisLink =
		'<li class="breadcrumb-item breadcrumb-item--current">
			<span class="breadcrumb-inner breadcrumb-inner--current">
				'.$thisText.'
			</span>
		</li>';
	} else if ($n == 0) {
		//Generates the home page link
		$thisLink =
		'<li class="breadcrumb-item breadcrumb-item--home">
			<a class="breadcrumb-inner breadcrumb-inner--link breadcrumb-inner--home" href="'.$thisDir.$thisIndex.'" title="Back to home page">
				'.$thisText.'
			</a>
		</li>';
	} else {
		//default link item for folders with an index
		$thisLink =
		'<li class="breadcrumb-item">
			<a class="breadcrumb-inner breadcrumb-inner--link" href="/pages'.$thisDir.$thisIndex.'">
				'.$thisText.'
			</a>
		</li>';
	}

	if ($thisLink != '') $linkArray[] = $thisLink;
	}

$results = (count($linkArray) > 0) ? implode($separator, $linkArray) : '';
if ($results != '') print(
	//wrapping HTML
'	<nav>
		<ul class="breadcrumb">
			'.$results.'
		</ul>
	</nav>'
);

?>