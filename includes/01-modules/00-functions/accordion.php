<?php

function accordion($imgSet, $accordion_array){
	echo '
	<ul class="accordion TK-noDots" data-jshook="accordion__reference">
	';

$contentExample =
'<p>The Department and NBN Co continued to work with key industry bodies and stakeholders to make sure processes for the migration of legacy services, such as medical and security alarms, are carried out to minimise the risk of losing functionality. To support this NBN Co developed and launched the Medical Alarms Register on 21 March 2014, which allows end users to register their location information. We also continued to monitor NBN Co&rsquo;s activities and performance in brownfields and new developments, liaised with the company on its performance, examined implementation issues, consulted stakeholders, liaised with state and territory Governments, and provided information to the public and other stakeholders.</p>

<p>With NBN Co we also agreed on how to transition from a mandatory to optional battery backup within the FTTP footprint. To make sure consumers are protected, the Australian Communications and Media Authority (ACMA) has been consulting on developing an appropriate regulatory</p>';

		for ($i = 0; $i < count($accordion_array); $i++) {
			$item = $accordion_array[$i];
			$heading = $item['heading'];
			$content = defaultTo($item['content'], $contentExample);
			$id =  idSafe($item['heading']);
			$imgAlt = $item['imgAlt'];

			if ($i == 0) {
				$jsHideClass = '';
				$openClass = ' accordion__item--isOpen-JS';
				$headHideClass = ' TK-jsHide';
			} else {
				$jsHideClass = ' TK-jsHide';
				$openClass = '';
				$headHideClass = '';
			}

			if (!isset($imgAlt)) {
				print ('Error: "imgAlt" must be defined');
				$imgAlt = 'Error: missing alt text';
				$imgSrc = 'image blocked due to missing alt text';
			} else {
				$imgSrc = '/assets/images/content/accordions/'.$imgSet.'/'.($i+1).'.jpg';
			}


			echo
			'<li id="accordion__'.$id.'" class="accordion__item block block--noPadding'.$openClass.'" data-jshook="accordion__item">
				<p class="accordion__heading'.$headHideClass.'" aria-hidden="true" data-jshook="accordion__heading">
					<a href="#accordion__'.$id.'" class="accordion__headLink" data-jshook="accordion__trigger--auto">
						<span class="accordion__headText">'.$heading.'</span>
						<span class="accordion__icon"></span>
					</a>
				</p>
				<div class="accordion__content TK-relative'.$jsHideClass.'" data-jshook="accordion__content">
					<div class="grid grid--thirds">
						<div class="accordion__text standardContent grid__cell grid__cell--span-2">
							<h2>'.$heading.'</h2>
							'.$content.'
						</div>
						<div style="background-image: url('.$imgSrc.')" class="accordion__imgWrap grid__cell">
							<span class="TK-visHid">'.$imgAlt.'</span>
						</div>
					</div>
				</div>
			</li>';

//close button HTML
//<a href="#accordion__'.$id.'" data-jshook="accordion__close" title="close"></a>
		}

	echo '
	</ul>
	';
}

	?>