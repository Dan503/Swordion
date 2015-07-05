<?php

function svg($icon) {
	//replaces dashes with spaces
	$altText = str_replace("-", " ", $icon);

	//generates the svg html
	print
	'<svg>
	  <switch>
	    <use xlink:href="#icon-'.$icon.'"></use>
	    <foreignObject>
	      <img src="./icomoon/PNG/'.$icon.'.png" alt="'.$altText.'">
	    </foreignObject>
	  </switch>
	</svg>';
}

?>