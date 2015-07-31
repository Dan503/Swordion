<nav class="navPrimary TK-clearFix">
	<ul class="navPrimary__list width--page grid grid--hasInners grid--vAlign">
		<?php
			$navPrimary_array = $navMap;

			for ($i = 0; $i < count($navPrimary_array); $i++) {
				$array = $navPrimary_array[$i];
				$text = $array['text'];
				$link = isset($array['link'])? $array['link'] : '#';
				$active = $location[0] == $i ?
					' navPrimary__link--isActive' : '';

				echo
				'<li class="navPrimary__item grid__cell">
					<a href="'.$link.'" class="navPrimary__link'.$active.' grid__inner TK-animate">
						<span class="navPrimary__text">'.$text.'</span>
					</a>
				</li>';
			}
		?>
	</ul>
</nav>
