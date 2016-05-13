
<?php function nav__item($item, $i){
	$itemID = idSafe('navItem');
	$isActive = amCurrentlyUnder($item);
	$activeClass = $isActive ? ' -isActive' : '';
	$accordionShow = $isActive ? $i + 1 : 'none';
	echo '
	<li id="'.$itemID.'" class="nav__item'.$activeClass.'" data-jshook="accordion__item">
		<div class="grid">
			<a href="'.$item['link'].'" class="nav__link grid__cell">'.$item['title'].'</a>';

	if (hasSubnav($item)){
			echo '
			<a href="#'.$itemID.'" title="Toggle sub navigation" class="nav__toggle grid__cell--noGrowth" data-jshook="accordion__trigger--auto">toggle</a>
		</div>';//closes the grid

			echo '
			<ul class="nav__list TK-noDots" data-jshook="accordion__revealer accordion__reference" data-accordion-show="'.$accordionShow.'">';
				foreach($item['subnav'] as $b => $subItem){
					nav__item($subItem, $b);
				}
			echo '
			</ul>';
	} else {
		//if no sub nav, just close the grid
		echo '
		</div>';
	}

	echo '
	</li>';
} ?>


