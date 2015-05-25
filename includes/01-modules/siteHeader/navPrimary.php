<nav class="navPrimary TK-clearFix">
	<ul class="navPrimary-list width--page grid grid--hasInners grid--vAlign">
		<?php
			$navPrimary_array = $navigationMap;

			for ($i = 0; $i < count($navPrimary_array); $i++) {
				$array = $navPrimary_array[$i];
				$text = $array['text'];
				$link = isset($array['link'])? $array['link'] : '#';
				$active = $navPrimary == $i ?
					' navPrimary-link--isActive' : '';

				echo
				'<li class="navPrimary-item grid-cell" data-jshook="triangle-triReference">
					<a href="'.$link.'" class="navPrimary-link'.$active.' grid-inner TK-animate">
						<span class="navPrimary-text">'.$text.'</span>
					</a>
				</li>';
			}
		?>
	</ul>
</nav>
