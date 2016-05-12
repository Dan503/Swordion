<?php

function accordion($settings = []){

	if (has('accordion')){

		$tempSets = $GLOBALS['template_settings']['accordion'];

		//if settings are defined in the function, use them, else use ['accordion'] attribute in order of (strongest to weakest): navMap item > template setting > layout setting
		$settings = defaultTo($settings,
			templateDefault(['accordion'], [
				'show' => 1,//The 1st item is open on page load, (also accepts "all", "none" or any other number)
				'standardContent' => true,
				'autoscroll' => true,//accepts "true", "false" and "mobile" ("mobile" only scrolls on mobile sized screens)
				'headings' => ['Heading 1', 'Heading 2', 'Heading 3', 'Heading 4', 'Heading 5'],
				'style' => 'auto', //also accepts "manual" (auto closes items as you open others, manual must be closed manually)
			])
		);

		$standardClass = $settings['standardContent'] ? ' standardContent' : '';
		$autoScroll = $settings['autoscroll'] ? 'true' : 'false';

//Main accordion HTML starts here

		echo '
		<ul class="accordion TK-noDots" data-jshook="accordion__reference" data-accordion-show="'.$settings['show'].'" data-accordion-autoscroll="'.$autoScroll.'">
		';
			foreach ($settings['headings'] as $i => $heading) {
				$id =  idSafe($heading);

				echo
				'<li id="accordion__'.$id.'" class="accordion__item block block--noPadding" data-jshook="accordion__item">
					<h2 class="accordion__heading TK-relative">
						<a href="#accordion__'.$id.'" class="accordion__headLink" data-jshook="accordion__trigger--'.$settings['style'].'">
							<span class="accordion__headText">'.$heading.'</span>
							<span class="accordion__icon"></span>
						</a>
					</h2>
					<div class="accordion__content TK-jsHide'.$standardClass.'" data-jshook="accordion__revealer">';
						loadContent('accordion/'.$i.'.php');
					echo '
					</div>
				</li>';
			}

		echo '
		</ul>
		';

	}
}

	?>