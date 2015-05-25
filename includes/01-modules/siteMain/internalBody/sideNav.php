
<aside class="sideNav">
	<h2 class="sideNav-heading"><?php echo $navigationMap[$navPrimary]['text'] ?></h2>
	<nav>
		<ul class="sideNav-list">
			<?php
				$sideNav_array = $navigationMap[$navPrimary]['subNav'];

				for ($i = 0; $i < count($sideNav_array); $i++) {
					$array = $sideNav_array[$i];
					$text = $array['text'];
					$link = isset($array['link'])? $array['link'] : '#';
					$activeClass = $i == $navSecondary ? ' sideNav-link--isActive' : '';
					echo
					'<li class="sideNav-item">
						<a href="'.$link.'" class="sideNav-link'.$activeClass.'">'.$text.'</a>
					</li>';
				}
			?>
		</ul>
	</nav>
</aside>