<div class="homeBase-inner grid-inner block block--hasButtons">
	<h2 class="block-heading">Latest Event</h2>

	<div class="listing listing--slim">
		<div class="listing-item">
			<a href="#" class="listing-imgContainer">
				<img class="listing-img" src="/assets/images/content/latestEvent.jpg" alt="Poster featuring a Growler Jet">
			</a>
			<div class="listing-content">
				<h3 class="listing-title"><a href="#" class="listing-titleLink">Air Power Seminars</a></h3>
				<div class="listing-text listing-text--compact">
					<p><time datetime="2014-09-23">23 September, 2014</time> -- Seminars</p>
					<p>Speaker: Group Captain Glen Braz</p>
					<p>Venue: R1 Theatre</p>
					<p>Time: <time datetime="09:00+10:00">0900</time> &ndash; <time datetime="10:30+10:00">1030</time></p>
				</div>
			</div>
		</div>
	</div>

	<h2 class="block-heading">Other Events</h2>

	<ul class="miniListing miniListing--grey TK-noDots">
		<?php
			$items_array = array(
				array(
					'text' => 'Australian International Airshow',
				), array(
					'text' => 'Chief of Air Force Symposium',
				), array(
					'text' => 'Air Power Conference',
				),
			);

			for ($i = 0; $i < count($items_array); $i++) {
				$array = $items_array[$i];
				$text = $array['text'];
				$link = $array['link'];
				echo
				'<li class="miniListing-item"><a href="#" class="miniListing-link" title="view event">'.$text.'</a></li>';
			}
		?>
	</ul>

	<div class="homeBase-btns block-buttons TK-clearFix">
		<a href="#" title="" class="homeBase-btn block-buttonsBtn btn">View All Events</a>
	</div>
</div>