

<?php
	function getBreadcrumb($map, $currDepth, $hasLastItem) {

		$location = $GLOBALS['location'];


		if (isset($location[$currDepth])){

			$target = $location[$currDepth];
			$text = $map['text'];
			$link = defaultTo($map['link'],'#');

			print
			'<li class="breadcrumb-item">';

				if ($link != false) {
					print '
					<a class="breadcrumb-inner breadcrumb-link" href="'.$link.'" title="Go to '.$text.'">
						'.$text.'
					</a>';
				} else {
					print '
					<span class="breadcrumb-inner breadcrumb-span">
						'.$text.'
					</a>';
				}
			print
			'</li>';

			getBreadcrumb($map['subNav'][$target], $currDepth + 1, $hasLastItem);

		} else {
			if ($hasLastItem == true) {
				print
				'<li class="breadcrumb-item breadcrumb-item--current">
					<span class="breadcrumb-inner breadcrumb-span breadcrumb-current">
						'.$map['text'].'
					</span>
				</li>';
			}
		}
	};

	function breadcrumb($settings){

		$defaultSettings = array(
			'hasLastItem' => true,
			'modifiers' => '',
		);

		$settings = isset($settings) ?
			defaultTo($settings, $defaultSettings) :
			$defaultSettings;

		$modifier = modifiers($settings['modifiers'], 'breadcrumb');

		$map = $GLOBALS['navigationMap'];
		$target = $GLOBALS['location'][0];

		if (is_array($GLOBALS['location'])){
			echo
			'<nav class="breadcrumb'.$modifier.'">
				<ul class="breadcrumb-list">
					<li class="breadcrumb-item breadcrumb-item--home">
						<a class="breadcrumb-link breadcrumb-inner breadcrumb-home" href="/" title="Back to home page">
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

