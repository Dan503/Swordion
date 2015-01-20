

<?php /*

just add this where you want the breadcrumb to go and it will do the rest! :)
<?php include($_SERVER['DOCUMENT_ROOT']."/breadcrumb.php"); ?>

!!!WARNING!!! This does NOT accept folders with no index files. It will break it.

This is a php plug-in taken from this site: http://www.mindpalette.com/archives/php-breadcrumbs/

*/?>



<?php

$convert_toSpace = true; // true if script should convert _ and - in folder names to spaces
$upperCaseWords = true;	// true if script should convert lowercase to initial caps
$topLevelName = "Home";	// name of home/root directory
$separator = "";		// characters(s) to separate links in hierarchy (default is a > with 2 spaces on either side)

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
		}
	return $index;
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
for ($n=0; $n<count($dirArray); $n++) {
	$thisDir .= $dirArray[$n].'/';
	$thisIndex = MPBCDirIndex($htmlRoot.$thisDir);
	$thisText = ($n == 0) ? $topLevelName : MPBCFixNames($dirArray[$n]);
	
	if ($thisIndex == ''){
		$thisLink = $thisText;
	} else if ($n == count ($dirArray) - 1) {
		$thisLink = '<li class="last">'.$thisText.'</li>';
	} else {
		$thisLink = '<li><a href="'.$thisDir.$thisIndex.'">'.$thisText.' </a></li>';
	}
	
	if ($thisLink != '') $linkArray[] = $thisLink;
	}

$results = (count($linkArray) > 0) ? implode($separator, $linkArray) : '';
if ($results != '') print('<ul id="breadcrumb">'.$results.'</ul>');

?>