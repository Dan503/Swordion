<ul class="accordion TK-noDots">


	<?php

$contentExample =
'<h4>Fellowships and Placements</h4>
<p>The Air Power Development Centre is resposible for the coordination and administration of CAF Fellowships, CDF Fellowships and hosts Graduate placements and ANU Internships.</p>

<p>Information about each of the fellowships and placements can be found through the following links. </p>

<ul>
	<li><a href="#">Chief of Air Force Fellowships</a> &ndash; placement or supervision through the Air Power Development Centre to invesitgate a subject of interest to the Royal Australian Air Force for periods ranging from a couple of weeks to 24 months.</li>
	<li><a href="#">Chief of Defence Force Fellowship</a> &ndash;  placement at the Air Power Development Centre for a 12 month period to investiage a problem of interest to the Australian Defence Force.</li>
	<li><a href="#">Graduate Placements</a> &ndash; the Air Power Development Centre hosts Graduate placements throughout the year.</li>
	<li><a href="#">ANU Internships</a> &ndash; the Air Power Development Centre hosts ANU internships for undergraduate students in their third year of study.</li>
</ul>';


		$accordion_array = array(
			array(
				'heading' => 'Fellowships',
			), array(
				'heading' => 'Officer Education Courses',
			), array(
				'heading' => 'Airmen Education Courses',
			), array(
				'heading' => 'Air Power Education Seminars',
			),
		);

		for ($i = 0; $i < count($accordion_array); $i++) {
			$array = $accordion_array[$i];
			$heading = $array['heading'];
			$content = isset($array['content'])? $array['content'] : $contentExample;
			$target =  preg_replace("/[^A-Za-z0-9]/", "", $array['heading']);

			echo
			'<li class="accordion-item">
				<h3 class="accordion-heading">
					<a href="#accordion-'.$target.'" class="accordion-headLink" data-jshook="accordion-trigger">
						<span class="accordion-headText">'.$heading.'</span>
						<span class="accordion-icon" data-jshook="accordion-icon"></span>
					</a>
				</h3>
				<div class="accordion-content TK-jsHide cmsContent--bodyText" id="accordion-'.$target.'">
					'.$content.'
				</div>
			</li>';
		}
	?>

</ul>