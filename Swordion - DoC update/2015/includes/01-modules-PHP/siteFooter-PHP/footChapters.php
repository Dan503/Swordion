<nav class="footChapters">
	<ol class="footChapters__list grid grid--cols-7 grid--hasInners grid--vAlign navCounters__counterReset">
		<?php
			$footChapters_array = $navMap;

			for ($i = 1; $i < count($footChapters_array); $i++) {
				$item = $footChapters_array[$i];
				$title = $item['title'];
				$link = defaultTo($item['link'], '#');

				$activeClass = $i == $location[0] ? ' footChapters__link--isActive' : '';

				echo
				'<li class="footChapters__item grid__cell">
					<a href="'.$link.'" class="footChapters__link grid__inner navCounters__item'.$activeClass.'">
						<span class="footChapters__linkInner">'.$title.'</span>
					</a>
				</li>';
			}
		?>
	</ol>
</nav>
