<?php

function accordion($accordion_array = array(
	['title' => 'Heading 1'],
	['title' => 'Heading 2'],
	['title' => 'Heading 3'],
)){

	echo '
	<ul class="accordion TK-noDots" data-jshook="accordion__reference">
	';


		foreach ($accordion_array as $i => $item) {
			$item = defaultTo($item, [
				'title' => 'Heading '.($i+1),
				'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed emolumenta communia esse dicuntur, recte autem facta et peccata non habentur communia. Audio equidem philosophi vocem, Epicure, sed quid tibi dicendum sit oblitus es. Satisne ergo pudori consulat, si quis sine teste libidini pareat? Tu autem negas fortem esse quemquam posse, qui dolorem malum putet. Qua tu etiam inprudens utebare non numquam. Expectoque quid ad id, quod quaerebam, respondeas. Rhetorice igitur, inquam, nos mavis quam dialectice disputare? </p>

<p>Duo Reges: constructio interrete. Isto modo, ne si avia quidem eius nata non esset. Serpere anguiculos, nare anaticulas, evolare merulas, cornibus uti videmus boves, nepas aculeis. Num igitur eum postea censes anxio animo aut sollicito fuisse? Laelius clamores sofòw ille so lebat Edere compellans gumias ex ordine nostros. Tum Torquatus: Prorsus, inquit, assentior; Igitur neque stultorum quisquam beatus neque sapientium non beatus. Eadem nunc mea adversum te oratio est. </p>',
			]);
			$id =  idSafe($item['title']);

			echo '
			<li class="accordion__item block block--noPadding" data-jshook="accordion__item">
				<h2 class="accordion__heading TK-relative">
					<a href="#accordion__'.$id.'" class="accordion__headLink grid" data-jshook="accordion__trigger--auto">
						<span class="accordion__headText grid__cell">'.$item['title'].'</span>
						<span class="accordion__icon grid__cell grid__cell--noGrowth"></span>
					</a>
				</h2>
				<div id="accordion__'.$id.'" class="accordion__content TK-jsHide" data-jshook="accordion__content">
					'.$item['content'].'
				</div>
			</li>';

		}

	echo '
	</ul>
	';
}

	?>