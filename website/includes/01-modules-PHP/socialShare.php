<aside class="socialShare">
	<ul class="socialShare__list TK-noDots">
	<?php

		$shareTitle = urlencode(strip_tags($getCurrent['title']));
		$shareURL = 'http://annualreport.communications.gov.au/2015';

		$items_array = array(
			array(
				'icon' => 'email',
				'text' => 'Share via email',
				'link' => 'mailto:?subject=This is cool! Comms Annual Report 2014-15&body=Check out the Department of Communications Annual Report '.$shareURL,
			), array(
				'icon' => 'facebook--invert',
				'text' => 'Share on Facebook',
				'link' => 'http://www.facebook.com/sharer/sharer.php?u='.$shareURL.'&title=Department+of+Communications+Annual+Report+2014-15',
			), array(
				'icon' => 'twitter',
				'text' => 'Tweet this site',
				'link' => 'http://twitter.com/intent/tweet?status=%23CommsAu+have+released+their+Annual+Report+2014-15,+take+a+look+'.shrinkUrl($shareURL),
			),
		);

		foreach ($items_array as $item) {
			$icon = $item['icon'];
			$text = $item['text'];
			$link = defaultTo($item['link'], '#');
			echo
			'<li class="socialShare__item">
				<a class="socialShare__link" href="'.$link.'">
					<i class="socialShare__icon icon-'.$icon.'"></i>
					<span class="socialShare__text">'
							.$text.
					'</span>
				</a>
			</li>';
		}
	?>
	</ul>
</aside>