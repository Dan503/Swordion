<div class="block block--noPadding block--withSpacing">

	<h2 class="block-heading block-heading--withPadding socialFeed-heading">Just In</h2>

	<ul class="socialFeed TK-noDots">
		<?php
			$items_array = array(
				array(
					'icon' => 'twitter',
					'body' => '100 Years of Military Aviation. Proceedings from the 2014 Air Power Conf. <a href="#" title="">http://airpower.airforce.gov.au/Publications/D...</a>',
					'extra_type' => 'image',
					'extra_src' => '/assets/images/content/socialFeed.jpg',
					'datetime' => '20h',

				), array(
					'icon' => 'facebook2',
					'body' => 'Air power and modern military forces.<br> <a href="#" title="hash tag Pathfinder">#Pathfinder</a> 235 <a href="#">http://airpower.airforce.gov.au/Publications/e...</a>',
					'extra_type' => 'video',
					'extra_src' => 'https://www.youtube-nocookie.com/embed/mLJJh5N_JpM',
					'datetime' => 'Dec 14',
				),
			);

			for ($i = 0; $i < count($items_array); $i++) {
				$array = $items_array[$i];
				$icon = $array['icon'];
				$body = $array['body'];
				$extra_type = $array['extra_type'];
				$extra_src = $array['extra_src'];
				$datetime = $array['datetime'];

				$extra_state = ($extra_type != 'video' && $extra_type != 'image')? ' socialFeed-extra--noExtras' : '';

				echo
				'<li class="socialFeed-item">
					<div class="socialFeed-head">
						<div class="socialFeed-profilePicContainer">
							<img class="socialFeed-profilePic" src="/assets/images/content/socialFeed-profilePic.png" alt="" />
						</div>
						<div class="socialFeed-headContent">
							<p class="socialFeed-headItem socialFeed-headItem--apdc">
								<a href="#" title="">
									<i class="socialFeed-icon icon-'.$icon.'"></i>
									Air Power Dev Center
								</a>
							</p>';
							if ($icon == 'twitter'){
								echo
								'<p class="socialFeed-headItem socialFeed-headItem--twitterHandel">@APDC_AirPower</p>';
							};
						echo
						'</div>
					</div>
					<div class="socialFeed-body spacing-lineHeight--tight">
						<p>'.$body.'</p>
					</div>
					<div class="socialFeed-extra'.$extra_state.' TK-clearFix">';

						if ($extra_type == 'image') {
							echo
							'<div class="socialFeed-image">
								<img src="'.$extra_src.'" alt="Image alt text would get taken from it&rsquo;s source if possible">
							</div>';
						} else if ($extra_type == 'video'){
							echo
							'<div class="socialFeed-video video video--noControls">
								<iframe width="100%" height="auto" src="'.$extra_src.'?rel=0&autohide=1&showinfo=0&autoplay=0&wmode=transparent" frameborder="0" allowfullscreen></iframe>
							</div>';
						}
						echo
						'<p class="infoStamp socialFeed-postDate TK-float--left">
							<time class="infoStamp-info infoStamp-info--datetime" datetime="2015-12-20 16:00">'.$datetime.'</time>
						</p>';

						if ($icon == 'twitter'){
							echo
							'<div class="socialFeed-twitterControls TK-float--right">
								<ul class="TK-noDots grid grid--thirds grid--gutter-twitterControls grid--disableMQs">
									<li class="grid-cell"><a href="#" title="Reply" class="icon-undo socialFeed-control socialFeed-control--reply"></a></li>
									<li class="grid-cell"><a href="#" title="Re-tweet" class="icon-loop socialFeed-control socialFeed-control--retweet"></a></li>
									<li class="grid-cell"><a href="#" title="Favourite" class="icon-star socialFeed-control socialFeed-control--favorite"></a></li>
								</ul>
							</div>';
						}
					echo
					'</div>
				</li>';
			}
		?>
	</ul>

</div>