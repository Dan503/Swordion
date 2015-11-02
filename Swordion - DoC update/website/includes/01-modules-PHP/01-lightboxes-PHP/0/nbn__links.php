<div class="standardContent">
	<?php

		$classSets = array(
			'TK-visHid',//for screen readers
			'TK-noDots TK-largeScreenOnly',//for desktop mode on the infographic
			'TK-nonLargeScreen',//for mobile mode in lightbox
		);

		foreach ($classSets as $i => $classes) {

			$aria = $i != 0 ? 'true' : 'false';

			echo
			'<ul class="'.$classes.'" aria-hidden='.$aria.'>
				<li><a href="https://www.communications.gov.au/sites/g/files/net301/f/3 _Section_152EOA_Report.pdf">Statutory Review of Part XIC of the Competition and Consumer Act 2010</a></li>
				<li><a href="http://www.communications.gov.au/broadband/national_broadband_network/cost-benefit_analysis_and_review_of_regulation/independent_cba_of_broadband">Independent Cost-Benefit Analysis of Broadband</a></li>
				<li><a href="http://www.communications.gov.au/broadband/national_broadband_network/cost-benefit_analysis_and_review_of_regulation/nbn_market_and_regulation_report">NBN Market and Regulatory Review</a></li>
			</ul>';
		}
	?>
</div>