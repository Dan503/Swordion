<?php

function megaMenu__item($item, $previousLocation, $index, $depth){
		$newLocation = $previousLocation;

		array_push($newLocation, $index);

		//if current page exists under the current nav item
		$activeClass = amCurrentlyUnder($newLocation) ? ' megaMenu__link--isActive' : '';

		$id = idSafe('subnavReference');

		$hoverTrigger = $depth == 1 ? ' accordion__trigger--hover' : '';

		echo '
		<li id="'.$id.'" class="megaMenu__item megaMenu__item--depth-'.$depth.'" data-jshook="accordion__item'.$hoverTrigger.'">
			<div class="grid grid--vAlign grid--noWrap">
				<a href="'.$item['link'].'" class="megaMenu__link megaMenu__link--depth-'.$depth.''.$activeClass.' grid__cell">'.$item['title'].'</a>';
		//remove $depth == 1 for infinite nesting
		if (isset($item['subnav']) && $item['subNavigable'] && $depth == 1){

				echo '
				<a href="#'.$id.'" title="toggle sub navigation" class="megaMenu__subTrigger megaMenu__subTrigger--depth-'.$depth.' grid__cell grid__cell--noGrowth" data-jshook="accordion__trigger--auto"></a>
			</div>';

			echo '
			<ul class="megaMenu__list megaMenu__list--depth-'.($depth+1).' TK-hide" data-jshook="accordion__content">';
				foreach ($item['subnav'] as $x => $subItem){

					megaMenu__item($subItem, $newLocation, $x, $depth+1);
				}
			echo'
			</ul>';
		} else {
			echo '
			</div>';//close the grid
		}

			echo '
		</li>';
}

?>