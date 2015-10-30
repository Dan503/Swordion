<?php

function accordion($imgSet, $accordion_array){
	echo '
	<ul class="accordion TK-noDots" data-jshook="accordion__reference">
	';

$contentExample =
'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed emolumenta communia esse dicuntur, recte autem facta et peccata non habentur communia. Audio equidem philosophi vocem, Epicure, sed quid tibi dicendum sit oblitus es. Satisne ergo pudori consulat, si quis sine teste libidini pareat? Tu autem negas fortem esse quemquam posse, qui dolorem malum putet. Qua tu etiam inprudens utebare non numquam. Expectoque quid ad id, quod quaerebam, respondeas. Rhetorice igitur, inquam, nos mavis quam dialectice disputare? </p>

<p>Duo Reges: constructio interrete. Isto modo, ne si avia quidem eius nata non esset. Serpere anguiculos, nare anaticulas, evolare merulas, cornibus uti videmus boves, nepas aculeis. Num igitur eum postea censes anxio animo aut sollicito fuisse? Laelius clamores sofòw ille so lebat Edere compellans gumias ex ordine nostros. Tum Torquatus: Prorsus, inquit, assentior; Igitur neque stultorum quisquam beatus neque sapientium non beatus. Eadem nunc mea adversum te oratio est. </p>';

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
					<div class="grid grid--cols-3">
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