

<?php
	function getBreadcrumb($map, $currDepth, $hasLastItem) {

		$location = $GLOBALS['location'];


		if (isset($location[$currDepth])){

			$target = $location[$currDepth];
			$text = $map['title'];
			$link = defaultTo($map['link'],'#');

			print
			'<li class="breadcrumb__item">';

				if ($link != false) {
					print '
					<a class="breadcrumb__inner breadcrumb__link" href="'.$link.'" title="Go to '.$text.'">
						'.$text.'
					</a>';
				} else {
					print '
					<span class="breadcrumb__inner breadcrumb__span">
						'.$text.'
					</a>';
				}
			print
			'</li>';

			getBreadcrumb($map['subNav'][$target], $currDepth + 1, $hasLastItem);

		} else {
			if ($hasLastItem == true) {
				print
				'<li class="breadcrumb__item breadcrumb__item--current">
					<span class="breadcrumb__inner breadcrumb__span breadcrumb__current">
						'.$map['title'].'
					</span>
				</li>';
			}
		}
	};

	function breadcrumb($settings = 'defaults'){

		$defaultSettings = array(
			'hasLastItem' => true,
			'modifiers' => '',
		);

		$settings = ($settings == 'defaults') ?
			$defaultSettings :
			defaultTo($settings, $defaultSettings);

		$modifier = modifiers($settings['modifiers'], 'breadcrumb');

		$map = $GLOBALS['navMap'];
		$target = $GLOBALS['location'][0];

		if (is_array($GLOBALS['location'])){
			echo
			'<nav class="breadcrumb'.$modifier.'">
				<ul class="breadcrumb__list">
					<li class="breadcrumb__item breadcrumb__item--home">
						<a class="breadcrumb__link breadcrumb__inner breadcrumb__home" href="/" title="Back to home page">
							Home
						</a>
					</li>';

					getBreadcrumb($map[$target], 1, $settings['hasLastItem']);

				echo
				'</ul>
			</nav>';
		}
	};

?>

