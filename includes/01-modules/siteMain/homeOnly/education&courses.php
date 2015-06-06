<div class="homeBase-inner grid-inner block block--hasButtons">
	<h2 class="block-heading">Education and Courses</h2>
	<div class="cmsContent cmsContent--borderedLists">
		<p>The Air Power Development Centre is involved in a number of other RAAF education programs including:</p>

		<ul>
			<?php
				$items_array = array(
					array(
						'text' => 'Fellowships',
					), array(
						'text' => 'Officer Education Courses',
					), array(
						'text' => 'Airmen Education Courses',
					), array(
						'text' => 'Air Power Education Seminars',
					),
				);

				for ($i = 0; $i < count($items_array); $i++) {
					$array = $items_array[$i];
					$text = $array['text'];
					echo
					'<li><a href="#">'.$text.'</a></li>';
				}
			?>
		</ul>
	</div>
	<div class="homeBase-btns block-buttons TK-clearFix">
		<a href="#" title="" class="homeBase-btn block-buttonsBtn btn TK-float--left">Read More</a>
		<a href="#" title="" class="homeBase-btn block-buttonsBtn btn TK-float--right">Login</a>
	</div>
</div>