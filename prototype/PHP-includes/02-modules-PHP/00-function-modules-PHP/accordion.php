<?php

function accordion($accordion_array = [
	['title' => 'Heading 1'],
	['title' => 'Heading 2'],
	['title' => 'Heading 3'],
]){

	if (has('accordion')){

		$tempSets = $GLOBALS['template_settings']['accordion'];

		//By default, the accordion will scroll the open segment to the top of the screen when opening and closing segments
		//Replace "true" with "false" if you don't want this to happen by default (it can be overidden in the template/page settings though)
		$willAutoscroll = templateDefault(['accordion', 'autoscroll'], true);
		$autoscroll =  $willAutoscroll ? ' data-accordion-autoscroll="true"' : '';
		$showType = defaultTo($tempSets['show'], 'first');

//Main accordion HTML starts here

		echo '
		<ul class="accordion TK-noDots" data-jshook="accordion__reference" data-accordion-show="'.$showType.'"'.$autoscroll.'>
		';

			for ($i = 0; $i < count($accordion_array); $i++) {
				$item = $accordion_array[$i];
				$heading = $item['title'];
				$id =  idSafe($item['title']);

				echo
				'<li id="accordion__'.$id.'" class="accordion__item block block--noPadding" data-jshook="accordion__item">
					<h2 class="accordion__heading TK-relative">
						<a href="#accordion__'.$id.'" class="accordion__headLink" data-jshook="accordion__trigger--auto">
							<span class="accordion__headText">'.$heading.'</span>
							<span class="accordion__icon"></span>
						</a>
					</h2>
					<div class="accordion__content TK-jsHide" data-jshook="accordion__content">';
						loadContent('accordion-content.php');
					echo '
					</div>
				</li>';

	//close button HTML
	//<a href="#accordion__'.$id.'" data-jshook="accordion__close" title="close"></a>
			}

		echo '
		</ul>
		';

	}
}

	?>