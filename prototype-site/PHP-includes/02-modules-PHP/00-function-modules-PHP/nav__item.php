
<?php function nav__item($item){
	$activeClass = amCurrentlyUnder($item) ? ' -isActive' : '';
	echo '
	<li class="nav__item'.$activeClass.'">
		<div class="grid">
			<a href="'.$item['title'].'" class="nav__link grid__cell">'.$item['title'].'</a>';

	if (hasSubnav($item)){
			echo '
			<a href="#" title="Toggle sub navigation" class="nav__toggle grid__cell--noGrowth"></a>
		</div>';//closes the grid

			echo '
			<ul class="nav__list">';
				foreach($item['subnav'] as $b => $subItem){
					nav__item($subItem);
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


