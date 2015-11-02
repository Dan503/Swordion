<?php

function caseStudy ($settings){

	$id = idSafe($settings['title']);

	echo '
	</div>

	<div class="caseStudy" id="heading-Casestudy'.$id.'">

		<div class="caseStudy__inner TK-pageWidth">
			<div class="caseStudy__grid grid grid--disableMQs">
				<div class="caseStudy__contentCell grid__cell grid__cell--span-3">
					<div class="caseStudy__content TK-pageWidth standardContent">
						<h2 class="caseStudy__heading">Case study</h2>
						<h3 class="caseStudy__subHeading">'.$settings['title'].'</h3>';

						if (!isset($settings['imgAlt'])){
							echo '<strong>CASE STUDY IMAGE ALT TEXT ("imgAlt") NOT SET!!!</strong>';
							//trigger_error('Case Study image alt text ("imgAlt") not set');
						}

						echo '
						<div class="caseStudy__overflowBlock standardContent" data-jshook="customScroll__scroller" data-mcs-theme="caseStudy">
						';
								include $_SERVER['DOCUMENT_ROOT'].$GLOBALS['root_location'].'/caseStudies/'.$settings['file'];
							echo '
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="siteMain TK-pageWidth">
	';

}
?>
