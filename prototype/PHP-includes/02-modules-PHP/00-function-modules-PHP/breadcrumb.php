

<?php
	function getBreadcrumb($map, $currDepth, $settings) {

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

			getBreadcrumb($map['subnav'][$target], $currDepth + 1, $settings);

		} else {
			if ($settings['hasLastItem'] == true) {
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

		//edit these to change how the breadcrumb displays by default
		$defaultSettings = array(
			//does the breadcrumb also show the current page?
			'hasLastItem' => false,

			//Does the breadcrumb show a home link at all?
			'hasHome' => true,

			//If it does, is the home link just an icon? (alternative is text)
			'homeIcon' => true,

			//Does the breadcrumb have any modifier classes?
			'modifiers' => array(),

			//Does the breadcrumb have any extra regular classes?
			'classes' => '',
		);

		$settings = ($settings == 'defaults') ?
			$defaultSettings :
			defaultTo($settings, $defaultSettings);

		$modifier = count($settings['modifiers']) > 0 ? modifiers($settings['modifiers'], 'breadcrumb') : '';

		$map = $GLOBALS['navMap'];
		$target = $GLOBALS['location'][0];

		if (is_array($GLOBALS['location'])){
			echo
			'<nav class="breadcrumb'.$modifier.' '.$settings['classes'].'">
				<ul class="breadcrumb__list">';

					if ($settings['hasHome']) {
						echo '
						<li class="breadcrumb__item breadcrumb__item--home">';
							if ($settings['homeIcon']){
								echo '
								<a class="icon-home breadcrumb__link breadcrumb__inner breadcrumb__home" href="/" title="Home"></a>';
							} else {
								echo '
								<a class="breadcrumb__link breadcrumb__inner breadcrumb__home" href="/" title="Back to home page">
									Home
								</a>';
							}
						echo '
						</li>';
					}

					getBreadcrumb($map[$target], 1, $settings['hasLastItem']);

				echo
				'</ul>
			</nav>';
		}
	};

?>

