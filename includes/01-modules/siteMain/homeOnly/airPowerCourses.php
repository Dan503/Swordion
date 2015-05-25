<div class="homeBase-inner block block--hasButtons grid-inner">
	<h2 class="block-heading">Air Power Courses</h2>

	<ul class="listing listing--slim">
		<?php
			$courses_array = array(
				array(
					'title' => 'Basic Air Power Course',
					'text' => 'Nominations for the 1-2015 Basic Air Power Course close on 9 Feb 2015.',
					'alt' => 'A cover made up of various aircraft',
				), array(
					'title' => 'Advanced Air Power Courses',
					'text' => 'Nominations for the 1-2015 Basic Air Power Course close on 9 Feb 2015.',
					'alt' => 'Military transport aircraft',
				), array(
					'title' => 'Fellowships',
					'text' => 'Nominations for the 1-2015 Basic Air Power Course close on 9 Feb 2015.',
					'alt' => 'Fighter jet',
				),
			);

			for ($i = 0; $i < count($courses_array); $i++) {
				$array = $courses_array[$i];
				$title = $array['title'];
				$text = $array['text'];
				$alt = $array['alt'];
				echo
				'<li class="listing-item">
					<a href="#" class="listing-imgContainer">
						<img class="listing-img" src="/assets/images/content/airPowerCourses/image'.($i+1).'.jpg" alt="'.$alt.'">
					</a>
					<div class="listing-content">
						<h3 class="listing-title"><a href="#" class="listing-titleLink">'.$title.'</a></h3>
						<div class="listing-text">
							<p>'.$text.'</p>
						</div>
					</div>
				</li>';
			}
		?>
	</ul>
	<div class="homeBase-btns block-buttons TK-clearFix">
		<a href="#" title="" class="homeBase-btn block-buttonsBtn btn">View All Courses</a>
	</div>
</div>