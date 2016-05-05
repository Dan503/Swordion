<?php

function accordion($settings = []){

	if (has('accordion')){

		$tempSets = $GLOBALS['template_settings']['accordion'];

		//if settings are defined in the function, use them, else use ['accordion'] attribute in order of (strongest to weakest): navMap item > template setting > layout setting
		$settings = defaultTo($settings,
			templateDefault(['accordion'], [
				'show' => 'first',
				'standardContent' => true,
				'autoscroll' => true,
				'headings' => ['Heading 1', 'Heading 2', 'Heading 3', 'Heading 4', 'Heading 5'],
			])
		);

		$autoscroll = $settings['autoscroll'] ? ' data-accordion-autoscroll="true"' : '';
		$showType = $settings['show'];
		$standardClass = $settings['standardContent'] ? ' standardContent' : '';

//Main accordion HTML starts here

		echo '
		<ul class="accordion TK-noDots" data-jshook="accordion__reference" data-accordion-show="'.$showType.'"'.$autoscroll.'>
		';
			foreach ($settings['headings'] as $i => $heading) {
				$id =  idSafe($heading);

				echo
				'<li id="accordion__'.$id.'" class="accordion__item block block--noPadding" data-jshook="accordion__item">
					<h2 class="accordion__heading TK-relative">
						<a href="#accordion__'.$id.'" class="accordion__headLink" data-jshook="accordion__trigger--auto">
							<span class="accordion__headText">'.$heading.'</span>
							<span class="accordion__icon"></span>
						</a>
					</h2>
					<div class="accordion__content TK-jsHide'.$standardClass.'" data-jshook="accordion__content">';
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